# mitafes2019_app

<img src="https://github.com/24daryo/mitafes2019_app/blob/master/image/init.png" width="600">

こちらは文化祭の催し物として制作した「表情診断」というアプリになります。

<img src="https://github.com/24daryo/mitafes2019_app/blob/master/image/odai.png" width="600">

お題が6つ提示され、それぞれのお題に沿った表情をすることでその人の表情の特徴を分析し、結果を出力します。

結果のサンプルは以下のようになります。

<img src="https://github.com/24daryo/mitafes2019_app/blob/master/image/result.png" width="600">

なお、本アプリは「version1.html」を起動することで様子を確認できますが、
表情診断の機能には、バックエンド処理をするサーバやAzureのFaceAPIが必要になります。


## 課題

開発期間が短かった関係で、AzureのFaceAPIを使用しましたが、OpenCVやディープラーニングを使用してより拡張性の高く、
学生としては比較的技術力が高い手法が使用できなかったことが課題となります。
また、コードの可読性が低いため、直接マークアップ言語を使用するのでなく、Reactのようなフレームワークを
使用した方がより、引継ぎも考慮すると良かったと思われます。
