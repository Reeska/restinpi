#!/bin/bash

directory=$1
target=$2

for file in "$directory"/*; do
	filename=$(basename "$file")
	serie=`echo $file | grep -i -E 'S[0-9]{2}e[0-9]{2}' | grep -v ".part"`
	
	# is serie name
	if [  -z "$serie" ] ; then
		echo "Not serie name: $file"
		continue
	fi	
	
	# check if is a directory and if it has part file in it
	if [ -d "$file" ] ; then
		echo "Directory: $file"
		parts=$(ls "$file" | grep -v ".part")
		if [ -z "$parts" ] ; then
			echo "Part file detected: $file"
			continue
		fi
	fi

	echo serie : $file
	
	parsed=$(echo $file | sed -r 's/^(.*)S([0-9]{2})e[0-9]{2}(.+)/\1#\2#\3/i')
	serie=$(echo $parsed | cut -d'#' -f1 | tr '.' ' ')
	saison=$(echo $parsed | cut -d'#' -f2 | tr '.' ' ')
	name=$(echo $parsed | cut -d'#' -f3 | tr '.' ' ')
	
	echo parsed : $parsed	
	
	# clean serie name
	serie=$(set -f; echo $serie)
	
	# get saison
	saison="Saison $(($saison + 0))"
	
	# dest directory
	dest="$target/$serie/$saison"

	# if serie dir exists
	serie_dir=$(ls $target | grep -i "$serie")

	if [ -z "$serie_dir" ] ; then
		dest="$target/$serie_dir/$saison"
	fi

	
	mkdir -p "$dest"
	mv "$file" "$dest/$filename"
done
