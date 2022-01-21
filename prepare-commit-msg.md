# Git Hook , prepare-commit-msg
## Achtung , chmod 777 prepare-commit-msg

	#!/bin/sh
	#
	# Automatically adds branch name and branch description to every commit message.
	#
	# todo:
	# * breaks merge commit message
	# * breaks git commit --amend

	# NAME=$(git branch | grep '*' | sed 's/* //')
	# DESCRIPTION=$(git config branch."$NAME".description)

	NAME=$(git branch | grep '*' | sed 's/* //') 
	# echo -n "$NAME"': '|cat - "$1" > /tmp/out && mv /tmp/out "$1"

	echo "[$NAME]"' '$(cat "$1") > "$1"

	# if [ -n "$DESCRIPTION" ]
	# then
	#    echo "" >> "$1"
	#   echo $DESCRIPTION >> "$1"
	# fi