# Laravel Lesson レビュー②

## Todo編集機能

### @method('PUT')を記述した行に何が出力されているか

<input type="hidden" name="_method" value="PUT">

### findメソッドの引数に指定しているIDは何のIDか

更新したいtodosテーブルのid

### findメソッドで実行しているSQLは何か

SELECT * FROM todos WHERE id;

### findメソッドで取得できる値は何か

パラメーターidで指定したレコード

### saveメソッドは何を基準にINSERTとUPDATEを切り替えているのか

findメゾットの中でレコードを取得できたとき。


## Todo論理削除

### traitとclassの違いとは

トレイトはメゾットとプロパティをクラスに追加できる。
クラスはインスタンス化できる。

### traitを使用するメリットとは

クラスにプロパティやメソッドを追加するための機能であるため、複数のクラス間でコードを共通にしたり再利用することができる。

## その他

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか

todocontrollerを初めて実行した時。todocontrollerのインスタンスを生成したとき。

### RequestクラスからFormRequestクラスに変更した理由

バリデーション専用のクラスにしたため

### $errorsのhasメソッドの引数・返り値は何か

引数：入力欄のname属性

返り値: bool

### $errorsのfirstメソッドの引数・返り値は何か

引数：入力欄のname属性

返り値: エラーメッセージ

### フレームワークとは何か

用意された枠組みに肉付けをするだけで誰でも一定品質のプロダクトを作成できるようにしたもの。

### MVCはどういったアーキテクチャか
開発効率を高めるために作られた構造

### ORMとは何か、またLaravelが使用しているORMは何か

プログラミング言語のClassとデータベースのテーブルを関連付けすることでSQLを直接操作することなく、データベースと関連付けされたClassのメソッドを用いることでDBとやり取りを行うもの。

Laravelでは、Eloquentが使用されている。

### composer.json, composer.lockとは何か

composer.json: 使用するパッケージの条件を定義する設計図

composer.lock: 実際の確定した一覧

### composerでインストールしたパッケージ（ライブラリ）はどのディレクトリに格納されるのか

venderディレクトリ
