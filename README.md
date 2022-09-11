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


bin/cake migrations seed --seed
