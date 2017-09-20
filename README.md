# 為電腦建立識別金鑰
<p>
從開始功能表裡面打開 git bash <br>
<br>
輸入以下指令，產生一把識別電腦用的金鑰<br>
<pre>ssh-keygen -t rsa -C “email address” </pre>
<br>
之後程式會詢問金鑰存放位址，直接按 Enter = 採用預設值<br>
接下來詢問是否使用密碼，若填入密碼，以後每次使用 github 上傳程式碼的時候都必須輸入這組密碼<br>
如果不想每次傳檔都打密碼的話，就留白直接 Enter<br>
<br>
<br>
打開以下預設路徑的檔案並複製裡面的內容，就可以在 github 設定裡貼上金鑰了<br>
<pre>C:\Users\你的使用者名稱\.ssh\id_rsa.pub</pre>

</p>
