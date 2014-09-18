$(function () {

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

	togglePrompt();

	$('#shell').click(function () {
		$('#shell input').focus()
	}).click();

	$('#shell form')
		.submit(function (e) {
			e.preventDefault();

			if (shell_lock) return;
			shell_lock = true;

			var cmd = $('#shell input').val();
			var end = $.Deferred();

			end.always(function () {
				shell_history.push($('#shell input').val());
				shell_index = 0;
				togglePrompt();
				$('#shell input').val("").blur().focus();
				shell_lock = false;
			});

			/**
			 * print prompt in log
			 */
			var oldprompt = $('#shell-prompt .prompt')[0].outerHTML + " " + cmd.replace(/</g, '&lt;').replace(/>/g, '&gt;');
			$('#shell-result').append("<p>" + oldprompt + "</p>");

			togglePrompt();

			if (cmd == 'clear') {
				$('#shell-result').html('');
				end.resolve();
			} else {
				$.getJSON('shell.php', {
					cmd: cmd
				}, function (data) {
					$('#shell-prompt .prompt').removeClass('success error')
						.addClass(data.ret == 0 ? 'success' : 'error')
						.text("[" + data.ret + "] pi@raspberrypi:");

					$('#shell-result').append("<pre>" + data.output + "</pre>");

					end.resolve();
				});
			}

			return false;
		});

	var arrows = {
		UP: 38,
		DOWN: 40,
		LEFT: 37,
		RIGHT: 36
	};

	$('#shell input').keydown(function (e) {


		if (e.keyCode == arrows.UP) {
			$(this).val(history_prev());
		}
		if (e.keyCode == arrows.DOWN) {
			$(this).val(history_next());
		}
	});

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