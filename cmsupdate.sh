#! /bin/bash
git add .
git commit -m '阶段完成'
git push
php artisan cms:create-update-file
git add .
git commit -m '新版发布'
git push
git push gitee
git checkout master
git merge dev
git push
git push gitee
git checkout dev
time=$(date "+%Y%m%d%H%M")
git archive --format zip --output public/zips/HDCMS-${time}.zip master
cp public/zips/HDCMS-${time}.zip /Users/xj/online/public/zips/HDCMS-${time}.zip