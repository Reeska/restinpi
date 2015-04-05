$(function () {
    /************************************************
     * ACTIONS
     ************************************************/

	$('.rpi_button').click(function() {
		var b = $(this);
		var a = b.data();

		b.removeClass('success error');

		$.get(a.action, function(data) {
			b.addClass(data.msg == 'success' ? 'success' : 'error');
		}, 'json').fail(function() {
			b.addClass('error');
		});
	});

    /************************************************
     * TABS (mobile)
     ************************************************/       
     
    $('#tabs span').click(function() {
       $('.tab').hide();
       $('#'+ $(this).data('target')).show();
       $('#tabs span.selected').removeClass('selected');
       $(this).addClass('selected');
    });
    
    /************************************************
     * SERVICES
     ************************************************/    
    
    /*
     * Make switch button
     */
    $('.switch-button').switchButton({
        labels_placement: "left"   
    }); 

    /**
     * Perform status change
     */
    var serv_lock = false;
    $('#services .status input').change(function() {
        var self = $(this);
        
        if (serv_lock || self.is(':disabled'))
            return;
        
        serv_lock = true;
        
        var status = self.parents('.status');
        var service = self.attr('name');
        var op = self.is(':checked') ? 'start' : 'stop';
        
        status.removeClass('fail');
        
        $.get('ws/services/service', {service : service, action : op}, function(data) {
            if (data.result == 'fail' && self.is(':checked') != data.started) {
                status.addClass('fail');
                self.switchButton("option", "checked", data.started);                
            }
        },'json')
        .fail(function(a,b,c) {
            status.addClass('fail');
            self.switchButton("option", "checked", !self.is(':checked'));
            alert('Error when changing service status.');
        }).always(function() {
           serv_lock = false; 
        });
    });
    
    /*var Service = {
		refreshTime : 2000,
		reload : function() {
			if (serv_lock)
				return;
			
			$.get('ws/services/list', function(data) {
				$.each(data, function(idx, elem) {
					var b = $('[name="' + elem.name + '"]');
					
					if (b.is(':checked') != elem.enabled) {
						b.switchButton('option', 'checked', elem.enabled);
					}
				});
				
				setTimeout(Service.reload, Service.refreshTime);
			},'json').fail(function() {
				alert('services::list fail');
			});
		}	
    };
    
    Service.reload();
    */

    /************************************************
     * SHELL
     ************************************************/
    
    $('.toggle').click(function () {
		$(this).siblings('.togglable').toggle();
	});

	var cursor = $('.cur');
    
	(function cur() {
		var to = (cursor.css('opacity') == "1" ? 0 : 1);
        
		cursor.animate({
			opacity: to
		}, 'slow', cur);
	})();

	var shell_lock = false;
	var shell_history = [];
	var shell_index = 0;
    var shell_prompt = $('#shell #shell-prompt input');

	togglePrompt();

    /**
     * EXECUTE
     */
	$('#shell form').click(function () {
		shell_prompt.focus()
	}).click();

	$('#shell form')
		.submit(function (e) {
			e.preventDefault();
            
			if (shell_lock) return;
            
			shell_lock = true;
            
			var cmd = shell_prompt.val();
			var end = $.Deferred();
            
			end.always(function () {
				shell_history.push(shell_prompt.val());
				shell_index = 0;
				togglePrompt();
                
				shell_prompt.val("").blur().focus();
				shell_lock = false;
			});
            
			/**
			 * print prompt in log
			 */
            var oldprompt = $('#shell-prompt .prompt')[0].outerHTML + " " + cmd.replace(/</g, '&lt;').replace(/>/g, '&gt;');
            
			$('#shell-result').append("<p>" + oldprompt + "</p>");
            
			togglePrompt();
            
            /**
             * Special command for rpi
             */
            if (cmd[0] == '/') {
                // $.get view/raspberry/execute cmd:"service r eerg"   
            }
            
			if (cmd == 'clear') {
				$('#shell-result').html('');
				end.resolve();
			} else {
				$.getJSON('ws/raspberry/shell', {
					cmd: cmd
				}, function (data) {
				    if (data.error) {
                        print(data.error, -1);				        
				    } else {
                        print(data.output, data.ret);
				    }
					end.resolve();
				}).fail(function(data,x,y,z) {
                    print('Ajax query fail : something was wrong !');
					end.resolve();				    
				});
			}
            
			return false;
		});
        
    /**
     * HISTORY
     */
	var arrows = {
		UP: 38,
		DOWN: 40,
		LEFT: 37,
		RIGHT: 36
	};

	$('#shell input').keydown(function (e) {
        var self = $(this);
		if (e.keyCode == arrows.UP) {
			self.val(history_prev());
		}
        
		if (e.keyCode == arrows.DOWN) {
			self.val(history_next());
		}

        self.selectRange(self.val().length);
	});
	
	function print(output, ret) {
		if (ret === undefined)
			ret = -1;
		
		$('#shell-prompt .prompt').removeClass('success error')
			.addClass(ret == 0 ? 'success' : 'error')
			.text("[" + ret + "] pi@raspberrypi:");
		$('#shell-result').append("<pre>" + output + "</pre>");
	}

	function history_prev() {
		//if ((shell_history.length + shell_index) <= 0) return;
		return shell_history[shell_history.length + (--shell_index)];
	}

	function history_next() {
		//if ((shell_history.length + shell_index) >= shell_history.length) return;
		return shell_history[shell_history.length + (++shell_index)];
	}
});

function togglePrompt() {
	$('#shell-prompt .write').toggle();
	$('#shell-prompt .cur').toggle();
}