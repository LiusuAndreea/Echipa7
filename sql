CREATE DATABASE IF NOT EXISTS rio_turism
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE rio_turism;

DROP TABLE IF EXISTS events;
DROP TABLE IF EXISTS attractions;

CREATE TABLE attractions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  short_desc TEXT NOT NULL,
  insider_tip TEXT NULL,
  address VARCHAR(255) NOT NULL,
  opening_hours VARCHAR(160) NOT NULL,
  duration_hint VARCHAR(60) NULL,
  area_hint VARCHAR(120) NULL,
  image_path VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE events (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(140) NOT NULL,
  event_date DATE NULL,
  location VARCHAR(160) NOT NULL,
  details TEXT NOT NULL,
  image_path VARCHAR(255) NULL,
  price_eur DECIMAL(10,2) NOT NULL DEFAULT 25.00,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO attractions
(name, short_desc, insider_tip, address, opening_hours, duration_hint, area_hint, image_path)
VALUES
(
  'Christ the Redeemer',
  'Cu brațele deschise, statuia „Cristos Mântuitorul” veghează de pe Muntele Corcovado asupra orașului și a pădurii tropicale. Are 30 de metri înălțime și o deschidere a brațelor de 28 de metri, fiind placată cu piatră de săpun (soapstone). Monumentul a fost construit ca simbol al credinței și al identității braziliene, iar priveliștea de sus explică imediat de ce este una dintre cele mai iubite atracții din Rio și una dintre Noile Șapte Minuni ale Lumii.',
  'Urcă cu trenul panoramic (aprox. 20 de minute) până pe Corcovado: ai priveliști spectaculoase și o experiență mult mai plăcută decât drumul cu mașina.',
  'Parque Nacional da Tijuca - Alto da Boa Vista, Rio de Janeiro - RJ',
  'Daily, 8:00 AM–7:00 PM',
  '2–3 ore',
  'Corcovado',
  'assets/img/christ.jpg'
),
(
  'Escadaria Selarón',
  'Plină de culoare și energie, Escadaria Selarón are 215 trepte pe care artistul Jorge Selarón le-a creat timp de 23 de ani. Mii de plăci ceramice au fost adunate din toată lumea și transformate într-o scară în aer liber, cu modele geometrice, imagini culturale din peste 60 de țări și detalii personale ale artistului. Este unul dintre cele mai fotogenice locuri din Rio.',
  'Pentru poze perfecte, vino dimineața devreme: lumina e mai bună și e mult mai liber decât la prânz.',
  'R. Manuel Carneiro - Santa Teresa, Rio de Janeiro - RJ, 20241-120',
  'Open 24 hours',
  '30–60 min',
  'Santa Teresa',
  'assets/img/selaron.jpg'
),
(
  'Sugarloaf Mountain (Pão de Açúcar)',
  'De sus, de pe Pão de Açúcar (Sugarloaf), orașul pare minuscul — și chiar simți că ești „deasupra” Rio-ului. Muntele are 396 m înălțime și este celebru pentru forma sa conică și pentru panoramele incredibile către golf, plaje și oraș. Urcarea cu telecabina în două etape este parte din experiență și una dintre atracțiile clasice ale orașului.',
  'Dacă vrei o experiență mai activă, poți face o parte din traseu pe jos sau, pentru pasionați, există și opțiuni de escaladă (cu ghid/echipament).',
  'Urca, Rio de Janeiro - RJ',
  'Daily, 8:30 AM–8:30 PM',
  '2–3 ore',
  'Urca',
  'assets/img/sugarloaf.jpg'
),
(
  'Tijuca National Park',
  'Pe potecile umbrite ale Parcului Național Tijuca, sunetele orașului dispar și rămâne doar pădurea tropicală: păsări exotice, vegetație densă și aer răcoros. Este una dintre cele mai mari păduri urbane din lume, cu aproximativ 200 km de trasee — de la plimbări ușoare până la rute mai solicitante pe stâncă. Ideal pentru natură, hiking și priveliști.',
  'Oprește-te la cascadele Horto (poți simți stropii de apă) și urcă la punctul de belvedere Vista Chinesa pentru o panoramă superbă asupra orașului.',
  'Estr. da Cascatinha, 850 - Alto da Boa Vista, Rio de Janeiro - RJ, 20531-590',
  'Daily, 8:00 AM–5:00 PM',
  'Jumătate de zi',
  'Alto da Boa Vista',
  'assets/img/tijuca.jpg'
),
(
  'Botanical Garden',
  'În zona de sud a orașului se află Grădina Botanică din Rio, un loc liniștit cu plante și faună din întreaga lume. Cu aproximativ 6.500 de specii de plante tropicale, alei cu palmieri și zone tematice, este perfectă pentru o plimbare relaxantă. Aici găsești și trasee dedicate speciilor rare sau amenințate.',
  'Intră și la Muzeul Grădinii Botanice pentru expoziții și elemente interactive legate de horticultură și biodiversitate.',
  'R. Jardim Botânico, 1008 - Jardim Botânico, Rio de Janeiro - RJ, 22460-030',
  'Thu–Tue 8:00 AM–5:00 PM; Wed 11:00 AM–5:00 PM',
  '2–3 ore',
  'Jardim Botânico',
  'assets/img/botanical.jpg'
),
(
  'Ipanema Beach',
  'O vizită în Rio nu e completă fără Plaja Ipanema. Faimoasă în toată lumea datorită piesei „The Girl from Ipanema”, plaja se întinde pe 2,4 km și este cunoscută pentru nisipul fin, valurile puternice și atmosfera vibrantă — localnici, sport, apusuri spectaculoase și o energie aparte.',
  'Vino înainte de 11:00 sau după 15:00 ca să eviți aglomerația; iar la apus rămâi puțin — lumina e superbă pentru poze.',
  'State of Rio de Janeiro',
  'Open 24 hours',
  '1–3 ore',
  'Ipanema',
  'assets/img/ipanema.jpg'
),
(
  'Copacabana Beach',
  'La umbra Muntelui Sugarloaf, Copacabana se întinde pe aproximativ 4 km și este una dintre cele mai cunoscute plaje din lume. E mereu animată: turiști, localnici, sport pe faleză, muzică și vibe de vacanță. Este locul perfect pentru o plimbare pe promenadă și pentru a simți „pulsul” orașului.',
  'Vizitează Fortul Copacabana (și micul muzeu) pentru priveliști excelente asupra plajei și oceanului.',
  'Copacabana, Rio de Janeiro - State of Rio de Janeiro',
  'Open 24 hours',
  '1–3 ore',
  'Copacabana',
  'assets/img/copacabana.jpg'
),
(
  'Museum of Tomorrow',
  'Muzeul Viitorului (Museum of Tomorrow) îți arată cum ar putea arăta lumea peste 50 de ani, prin expoziții interactive despre climă, tehnologie și viitorul societății. Clădirea, proiectată de Santiago Calatrava, este ea însăși o atracție: un design futurist care a devenit simbol al zonei Porto Maravilha.',
  'Pentru cele mai bune poze cu arhitectura, plimbă-te prin grădinile din jur: oglinzile de apă reflectă perfect clădirea.',
  'Praça Mauá, 1 - Centro, Rio de Janeiro - RJ, 20081-240',
  'Tue–Sun 10:00 AM–6:00 PM (Mon closed)',
  '1–2 ore',
  'Centro',
  'assets/img/museum.jpg'
);

INSERT INTO events (title, event_date, location, details, image_path, price_eur) VALUES
('Festival de Samba', '2026-03-15', 'Sambódromo, Rio', 'Parade, muzică live și atmosferă autentică.', NULL, 35.00),
('Noapte la Muzeu', '2026-04-05', 'Praça Mauá', 'Acces extins la expoziții + activități interactive.', NULL, 20.00);


INSERT INTO events (title, event_date, location, details, image_path, price_eur)
VALUES
('Carnavalul din Rio', NULL, 'Sambódromo, Rio de Janeiro', 'Cel mai faimos carnaval din lume: parade spectaculoase, școli de samba și o atmosferă unică.', 'assets/img/carnaval.jpg', 45.00);

USE rio_turism;

INSERT INTO attractions
(name, short_desc, insider_tip, address, opening_hours, duration_hint, area_hint, image_path)
VALUES
(
  'Stadionul Maracanã',
  'Unul dintre cele mai faimoase stadioane din lume, Maracanã este un simbol al fotbalului brazilian. Aici s-au jucat meciuri legendare, iar turul stadionului îți arată vestiarele, tunelul jucătorilor și zona muzeului.',
  'Rezervă un tur ghidat dimineața pentru a evita aglomerația și pentru poze mai bune în tribune.',
  'Av. Pres. Castelo Branco, Portão 3 - Maracanã, Rio de Janeiro - RJ',
  'Zilnic, 9:00–17:00',
  '1–2 ore',
  'Maracanã',
  'assets/img/maracana.jpg'
);


UPDATE events
SET image_path = 'assets/img/samba.jpg'
WHERE title = 'Festival de Samba';

UPDATE events
SET image_path = 'assets/img/muzeu.jpg'
WHERE title = 'Noapte la Muzeu';
USE rio_turism;





UPDATE events
SET image_path = 'assets/img/samba.jpg'
WHERE title = 'Festival de Samba';

UPDATE events
SET image_path = 'assets/img/muzeu.jpg'
WHERE title = 'Noapte la Muzeu';

INSERT INTO events (title, event_date, location, details, image_path, price_eur)
VALUES
(
  'Tur VIP Maracanã – Football Experience',
  '2026-05-10',
  'Stadionul Maracanã, Rio',
  'Tur ghidat + acces în zone speciale și mini-expoziție despre istoria stadionului. Ideal pentru fani și pentru poze.',
  'assets/img/maracana.jpg',
  28.00
);


