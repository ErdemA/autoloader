PHP SPL Autoloader
==========

<ul>
	<li>Sitede yer alan sınıfları çağrıldığı anda include eden kütüphane.</li>
	<li>Çağrılan sınıflarda isteğe bağlı çalışan <b>_init</b> metotunu çağırır.</li>
</ul>

<h2>Kullanımı</h2>

<ul>
  <li>Kullandığınız sınıfları <b>classes</b> dizinin altında tutmanız gerekmektedir.</li>
  <li>projenize autoloader sınıfını dahil etmeniz yeterlidir</li>
  <code>include('autoloader.php');</code>
</ul>