wpmob_dir=~/workspace_sc/WPMobileApps/app
wpmob_theme_dir=$wpmob_dir/themes/mobilissimo
asset_dir=~/workspace_sc/WPMobileApps/wordpress-svn/assets
dist_dir=~/workspace_sc/WPMobileApps/wordpress-svn/trunk
dist_theme_dir=$dist_dir/themes/mobilissimo

rm -r  $dist_dir
rm -r $asset_dir

cd $wpmob_dir
mkdir -p $dist_dir
git archive master | tar -x -C $dist_dir
cd $wpmob_theme_dir
mkdir -p $dist_theme_dir
git archive master | tar -x -C $dist_theme_dir
cd $dist_dir
mkdir -p $asset_dir; mv assets/* $asset_dir; cp $asset_dir/icon.png assets;
find . -iname '.gitignore' -exec rm {} \;
rm *.sh
