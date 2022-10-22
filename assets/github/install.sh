#!/usr/bin/env bash
Dir="/Applications/GitHub Desktop.app/Contents/Resources/app"
cli_dir=$(pwd)

# 获取速入
if  [ "$1"  = "" ]; then
  action="install"
else
  action=$1
fi

function backups() {
  if ! test -f "$Dir/backups"; then
    mkdir "$Dir/backups"
  fi
  cp "$Dir/main.js" "$Dir/backups/main.js"
  cp "$Dir/renderer.js" "$Dir/backups/renderer.js"
  echo -e "-源文件备份在: $Dir/backups"
}

function unBackups() {
    cp  "$Dir/backups/main.js" "$Dir/main.js"
    cp  "$Dir/backups/renderer.js" "$Dir/renderer.js"
}

if [ $action = "install" ]; then
  if ! test -f "$Dir/backups/main.js"; then
    backups
  fi
  cp "$cli_dir/dist/main.js" "$Dir/main.js"
  cp "$cli_dir/dist/renderer.js" "$Dir/renderer.js"
#  open "$Dir/backups"
elif [ $action = "uninstall" ]; then
  unBackups
  read  -p "是否删除备份文件<y or n 默认:n>:" name
  if  [ "$name"  = "y" ]; then
    echo -e "删除备份文件..."
    rm -R "$Dir/backups"
  fi
  echo -e "已从备份文件还原"
else
  echo "你的输入不正确"
fi
exit 1
#open $Dir


#open $Dir
#备份
#sudo cp /Applications/GitHub\ Desktop.app/Contents/Resources/app/main.js /Library/WebServer/Documents/download/assets/github/backups/main.js
#sudo cp /Applications/GitHub\ Desktop.app/Contents/Resources/app/renderer.js /Library/WebServer/Documents/download/assets/github/backups/renderer.js

#复制
#sudo cp  /Library/WebServer/Documents/download/assets/github/language/main.js /Applications/GitHub\ Desktop.app/Contents/Resources/app/main.js
#sudo cp /Library/WebServer/Documents/download/assets/github/language/renderer.js /Applications/GitHub\ Desktop.app/Contents/Resources/app/renderer.js

#还原
#sudo cp  /Library/WebServer/Documents/download/assets/github/backups/main.js /Applications/GitHub\ Desktop.app/Contents/Resources/app/main.js
#sudo cp /Library/WebServer/Documents/download/assets/github/backups/renderer.js /Applications/GitHub\ Desktop.app/Contents/Resources/app/renderer.js

#部署
#sudo cp  /Library/WebServer/Documents/download/assets/github/translate/main.js /Applications/GitHub\ Desktop.app/Contents/Resources/app/main.js
#sudo cp /Library/WebServer/Documents/download/assets/github/translate/renderer.js /Applications/GitHub\ Desktop.app/Contents/Resources/app/renderer.js
#checkForUpdates(t)