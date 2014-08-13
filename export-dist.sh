wpmob_dir=~/workspace_sc/WPMobileApps/app
wpmob_theme_dir=$wpmob_dir/themes/mobilissimo
dist_dir=~/workspace_sc/WPMobileApps/dist/WPMobileApps
dist_theme_dir=$dist_dir/themes/mobilissimo
if [ -f $dist_dir ]
then
	rm -r  $dist_dir
fi
cd $wpmob_dir
mkdir -p $dist_dir
git archive master | tar -x -C $dist_dir
cd $wpmob_theme_dir
mkdir -p $dist_theme_dir
git archive master | tar -x -C $dist_theme_dir
cd $dist_dir
find . -iname '.gitignore' -exec rm {} \;
rm export-dist.sh
rm create-po.sh
cd ..
zip -qr WPMobileApps.zip WPMobileApps
