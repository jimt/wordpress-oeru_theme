#!/bin/bash

# color to make
COLOR="#000000"
# subdirectory to put it in
DST="black"

for i in *.svg
do
	echo $i -> "$DST/$(basename $i .svg).png"
	# unfortunately, rsvg-convert doesn't seem to accept stdin
	#  so we create a temporary .svg file and then nuke it
	sed -e "s/fill=\"#FFFFFF\"/fill=\"$COLOR\"/" <$i >"$DST/$i"
	rsvg-convert "$DST/$i" >"$DST/$(basename $i .svg).png"
	rm "$DST/$i"
done

