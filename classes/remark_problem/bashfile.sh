#!/bin/sh
IFS='#' read -r -a array <<< $(cat inputfile.txt)
for element in "${array[@]}"
do
	echo "$element" | ./a.out >> outputfile.txt
done

