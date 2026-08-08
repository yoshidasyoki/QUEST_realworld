# RealWorld
アプレンティス「Laravel編」の提出課題になります。

## 概要
RealWorldというフレームワークを学習するために作成されたプロジェクトがあり、その中の「Conduit」という架空のブログサイト作成に取り組みました。  
基本的なCRUD操作＋認証・認可の処理をLaravelで実装しました。

主な仕様は以下の通りです。

- ホーム画面には投稿された記事を一覧表示する
- 記事はタイトル、サブタイトル、本文、タグの4項目を記入＆タグは3つまで選択可能
- 記事は投稿者本人のみ編集/削除操作を行うことができる
- 記事一覧は未ログインでも閲覧可能
- 記事の投稿/編集/削除はログイン状態でのみ実行可能
- 記事の編集/削除は投稿者本人のみ操作可能

## 使用方法
ローカル環境で動作させるための手順をここでは紹介します。

> [!WARNING]  
> `Linux`と`Docker`環境が必要になります。

### ソースコードの取り込み
最初に任意のディレクトリに移動し、ソースコードをお手元のPCに取り込みます。
```bash
git clone https://github.com/yoshidasyoki/QUEST_war-card-game.git .
```

`ls`コマンドで確認し、以下のようなディレクトリ・ファイル構造となっていればOKです。
```
# 実行結果
compose.yml  docker  src
```

### 環境変数の設定
動作を行わせるうえで、環境変数の設定が一部必要になります。  

最初にDockerコンテナの権限

次に`compose.yml`と同階層の場所で以下コマンドを実行し、イメージの作成を行います（数分かかる場合があります）。
```bash
docker compose build
```

完了のメッセージが出たらコンテナの作成・起動も行います。
```bash
docker compose up -d
```

`docker compose ps`コマンドで起動状態を確認し、`web`コンテナが表示されればOKです。
```bash
docker compose ps
```
```
# 実行結果
NAME         IMAGE      COMMAND                  SERVICE   CREATED          STATUS          PORTS
test-web-1   test-web   "docker-php-entrypoi…"   web       15 seconds ago   Up 14 seconds   80/tcp
```

以下コマンドでゲームの動作に必要となるライブラリやモジュールのインストールを行います。
```bash
docker compose exec web composer install
```
完了のメッセージが出たら環境構築は終了になります。

### ゲーム開始方法
`compose.yml`ファイルと同階層にいる状態で以下コマンドを実行するとゲームを開始することができます。
```bash
docker compose exec web php index.php
```
```
# 実行結果
戦争を開始します。
プレイヤーの人数を入力してください（2~5）：
```

またはコンテナの中に入った状態でゲームを行うこともできます。  
#### コンテナ内へ移動
```bash
docker compose exec web bash
```
```
# 実行結果（コンテナ内部へアクセス成功）
root@3819c39a97a8:/var/www/html#
```

#### ゲーム開始
```bash
php index.php
```
```
# 実行結果
戦争を開始します。
プレイヤーの人数を入力してください（2~5）：
```
