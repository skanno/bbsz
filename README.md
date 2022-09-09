# BBSZ

- マイグレーションファイル作成
```bash
bin/cake bake migration CreateProducts name:string description:text created modified
```

- マイグレーション実行
```bash
bin/cake migrations migrate
```

- マイグレーションロールバック
```bash
bin/cake migrations rollback
```

- シーダーファイル作成
```bash
bin/phinx seed:create UserSeeder
```

- シード実行
```bash
bin/cake migrations seed
```










git config --global user.name "Shoichiro KANNO"
git config --global user.email "s-kanno@qb3.so-net.ne.jp"
git config --global core.editor 'vim -c "set fenc=utf-8"'
git config --global core.autocrlf false
git config --global core.quotepath false
git config --global color.diff auto
git config --global color.status auto
git config --global color.branch auto
git config --global alias.logs "log --decorate --graph --branches --tags --remotes"
