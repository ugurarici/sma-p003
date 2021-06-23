-- Veritabani yaratılması
CREATE DATABASE sma_p003_world CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- veritabanında bir tablo yaratılması
CREATE TABLE articles ( id INT(11) NOT NULL AUTO_INCREMENT , title VARCHAR(255) NOT NULL , content TEXT NOT NULL , PRIMARY KEY (id)) ENGINE = InnoDB;

-- Yeni bir satır eklenmesi
INSERT INTO articles (title, content) VALUES ('başlık değeri', 'içerik değeri');

-- Tablodaki tüm sütunlarla beraber tüm satırların çekilmesi
SELECT * FROM articles;

-- Tablodaki belirtilen sütun ya da sütunları içerekcek şekilde tüm satırların çekilmesi
SELECT title, content FROM articles;

-- Veri okuması için bir şart belirtilmesi
SELECT * FROM articles WHERE id >= 3;

-- Veri okunması şartında, 'herhangi bir' değer için atama (% işareti)
SELECT * FROM articles WHERE title LIKE '%makale%';

-- Veri okuması şartında NULL olan ya da olmayan değerleri isteyebiliriz
SELECT * FROM articles WHERE content IS NULL;
SELECT * FROM articles WHERE content IS NOT NULL;

-- Seçilen verilerin sıralamasını belirlemek
SELECT * FROM articles ORDER BY id DESC;
-- ORDER BY dedikten sonra hangi sütuna göre Artan mı (ASC) yoksa azalan mı (DESC) sıralama yapmak istediğimizi söyleriz

-- Seçilecek satırlar için bir miktar ve hatta başlangıçta atlanacak satır adedi belirterek aralık vermek mümkündür
SELECT * FROM articles LIMIT 3;
-- ilgili sorguyu yalnızca 3 adet getirmek için çalıştırır

SELECT * FROM articles LIMIT 5, 3;
-- ilgili sorgu için eşleşen kayıtlardan ilk 5 tanesini atlar
-- sonraki 3 tanesini getirir

-- ÖRNEK:   en yeniden en eskiye gözükecek, sayfa başı 10 adet kayıt gösterilerek listeleme yapılacak
--          bir proje için ilk 3 sayfanın SQL sorgusunu yazınız
SELECT * FROM articles ORDER BY id DESC LIMIT 0, 10; -- ilk sayfa 0 tane atlar, 10 tane alır
SELECT * FROM articles ORDER BY id DESC LIMIT 10, 10; -- ikinci sayfa 10 tane atlar, 10 tane alır
SELECT * FROM articles ORDER BY id DESC LIMIT 20, 10; -- üçüncü sayfa 20 tane atlar, 10 tane alır

-- Bu yapılandırılmış ifadeler birlikte kullanılabilir
SELECT id, title FROM articles WHERE id >= 2 AND title LIKE '%as%' ORDER BY id DESC, title ASC LIMIT 5;
-- Kullanım için önce WHERE, sonra ORDER BY en sonlarında LIMIT şeklinde kullanılmalı

-- Satır ya da satırlarda güncelleme yapılması
UPDATE articles SET title = 'Güncellenmiş Başlık';
-- bu durumda bir şart belirtilmediği için bu güncelleme tablodaki tüm satırlara uygulanır
-- bu yüzden hangi satıra işaret ettiğimizi belirtmemiz gerekir

UPDATE articles SET title = 'Diğer Güncellenmiş Başlık' WHERE id = 3;

-- Satır ya da satırların silinmesi
DELETE FROM articles;
-- Bu sorguda bir filtreleme olmadığı için tablodaki tüm satırları siler
-- DELETE sorgularını da WHERE şartı koymadan çalıştırmaktan kaçınmalıyız

--  id'si 3 olan satırın silinmesi
DELETE FROM articles WHERE id = 3;

-- Diğer ifadeler de sorgunun devamına eklenebilir
DELETE FROM articles ORDER BY id LIMIT 1;
-- son eklenen kaydın silinmesi amacıyla sıralamayı tersten yapıp 1 adet ile sınırlandırılarak silinebilir

-- DELETE FROM ilgili satır ya da satırları siler ancak teknik olarak tabloyu boşaltmış olmaz
-- Çünkü bir tablonun içinde kayıtlı satırların haricinde, kaydedilmiş son satırın id değeri gibi tanımlayıcı veriler de bulunur
-- Bir tablo yeni oluşturulduktan sonra 1 kayıt eklediğinizde onun id'si 1 olur
-- 1 id'li bu kayıdı silip yerine yeni bir kayıt eklediğinizde id'si 2 olur
-- Çünkü tablo boşaltılmamıştır, tablonun içindeki kayıt silinmiştir
-- Son id değerinin de (bu tip tüm atamaların) temizlenmesi için tablo komple boşaltılmalıdır
TRUNCATE articles;