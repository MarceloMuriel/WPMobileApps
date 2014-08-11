if [ $# -eq 0 ]
then
	echo "Missing parameters!"
	echo $'Usage: \ncreate-po.sh out.po \ncreate-po.sh in-dir out-dir out.po'
	exit 1
fi

if [ $# -eq 3 ]
then
	find $1 -iname "*.php" -exec echo {} >> php-files.txt \;
	out_dir=$2
	out_file=$3
elif [ $# -eq 1 ]
then
	find core -iname "*.php" -exec echo {} >> php-files.txt \;
	echo $'wpmob.php\n' >> php-files.txt
	out_dir=lang
	out_file=$1
else
	echo "Invalid number of parameters!"
	exit 1
fi

touch messages.po
xgettext --force-po --add-comments --from-code=UTF-8 --language=php --keyword=__ --keyword=_e --package-name=wpmobile --package-version=1.0 --msgid-bugs-address=noreply@wpmobile-apps.com -o messages.po -f php-files.txt

if [ -f $out_dir/$out_file ]
then
	cp $out_dir/$out_file $out_dir/$out_file.bak
	msgmerge -o $out_dir/$out_file $out_dir/$out_file.bak messages.po
	rm messages.po
	rm $out_dir/$out_file.bak
else
	mv messages.po $out_dir/$out_file
fi
rm php-files.txt
