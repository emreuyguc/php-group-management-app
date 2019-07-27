![author](https://img.shields.io/badge/AUTHOR-EMRE%20UTKU%20UYGUC-red)
![author](https://img.shields.io/badge/CONTACT-emreuyguc@gmail.com-yellowgreen)
![author](https://img.shields.io/badge/-PHP-green)
![author](https://img.shields.io/badge/-MYSQL-blue)


# Php Whatsapp Grup Yönetim Yazılımı (Motor club)

Php ile kendi frameworkum üzerinde yapmış olduğum whatsapp gruplarının başvuru , onaylama , red ve kullanıcıların diğer kullanıcı bilgilerini takip etme yazılımı. Motor grubumuz için yapmıştım fakat kullanıma açamadık sizlerle paylaşıyorum tablo ve phpde ufak tefek değişiklik ile istediğiniz bilgileri kayıt edebilir whatsapp linklerini üyelere sunabilir başvuruları mail adresinize gelen link ile onaylayabilirsiniz.

## Özellikler

* Mail İle Başvuru Onaylama
* Yönetim paneli Başvuru Onaylama ve Red Etme
* Onay sonrası otomatik şifre verme
* Onay sonrası kullanıcıya mail ile grup bilgisi ve linkinin gönderilmesi
* Birden Fazla Yönetici (manuel ekleme)
* Kullanıcı bilgi güncelleme
* Kullanıcı panelinde diğer grup üyelerini görme ve tabloda arama yapma
* Tek telefon numarasıyla başvuru kabulu
* Başvuru daha önceden yapılmışsa diğeri onaylanmadan veya red edilmeden yeni başvuru yapamama
* Birden fazla whatsapp grubu ekleme ve linklerini anında güncelleyebilme
* Yeni başvuruları onay esnasında belirli gruplara atayabilme

## Yapılacaklar User Bölgesi
- ÜYELİK İPTAL TALEBİ
- GİRİŞ LOG
- LİNK İSTEK LOG
- GÜNCELLEME LOG SİFRE VE PROFİL
- TEKRAR LİNK İSTEĞİ // Gereklilik durumu tartışılır..
- LİNK İSTEĞİNDE ADMİN KONTROLU YADA KULLANICIYA ÖZEL KISA LİNK GÖNDERİMİ --> ADMİN MAİL BİLDİRİMİ
## Yapılacaklar Admin Bölgesi
- Tüm üye bilgi -> kullanıcı şifre güncelleme, deaktif etme
- Link talep olursa -> link isteklerini görme , kısa link takibi
- Admin Ekleme Düzenleme
- Email Hızlı Red
- Etkinlikler Duyurular
- Yönetici mail yani kullanıcı başvurusyu mail loglama
- Log izleme ve en yeni başvuruları hızlı görme

## Kullanım

* System\Engine\Confs\Database.confs.php   Dosyasından veritabanı ayarı
* System\Engine\Confs\AreaGeneral.confs.php   Dosyasından   Admin ve Public  Title ayarı Ayrıca  UrlVar ile Erişim linki belirlenmesi
* System\App\Confs\phpmailer.confs.php  Dosyasından mail host ayarları
* Veritabanının aktarımı
* Manuel olarak Veritabanı yoneticiler tablosuna  kullanıcı adı şifre ve email adresinin doğru girilmesi (onay linkleri bu emaile düşer)
* Egerki Sütün Eklemek Çıkartmak İstiyorsanız
  ### Public Tarafında
  * Uyeler , Profil , Basvuru Controllerlarını düzenleyiniz !
  * Mail için Areas\Public\Storage\Files içindeki html dosyalarına {{ }} etiketleri arasına değişkenleri ayarlayın
  ### Admin Tarafında
  * Uyeler, BasvuruIslem , Aktif Basvurular , Red ve Onaylanan basvurular , Grup Detay  Controllerlarını  düzenleyiniz !
  * Not : Üye ve Başvuru CRUD işlemleri BasvuruIslem sayfasına yapılan ajax jqery istekleriyle tamamlanıyor
  * Not2 : Mail Düzenlemesi için Areas\ PUBLİC VE ADMİN \Storage\Files içindeki html dosyalarına {{ }} etiketleri arasına değişkenleri ayarlayın
  
* Sistem notu : Controllerdaki fonksiyonlar System\Engine\Classes\root.controller.class adlı sınıftan extends edilmektedir.
## Görseller


![screen](https://i.ibb.co/0JgSTNL/rnek-basvuru.png)

![screen](https://i.ibb.co/JmLrZYF/girsss.png)

![screen](https://i.ibb.co/xsT2mKB/giris.png)

![screen](https://i.ibb.co/C78rNGz/yonetimm.png)

![screen](https://i.ibb.co/4YSCB4X/onay.png)

![screen](https://i.ibb.co/khDzqVp/ggg.png)

![screen](https://i.ibb.co/YP4SWnf/EMA.png)

![screen](https://i.ibb.co/PCGsccX/ema2.png)


