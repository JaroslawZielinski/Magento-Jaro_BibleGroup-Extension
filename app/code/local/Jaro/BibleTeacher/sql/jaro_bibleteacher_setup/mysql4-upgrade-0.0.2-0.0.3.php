<?php

/**
 *
 */
$installer = $this;
$installer->startSetup();

//wers nauczania
$teachingsVerse = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId(0)
        ->setVersesType(1)
        ->setTranslationId(1)
        ->setNumberingId(1)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(0)
        ->setStop(16)
        ->setContent('(1) A wiedz o tym, że w dniach ostatnich nastaną chwile trudne. (2) Ludzie bowiem będą samolubni, chciwi, wyniośli, pyszni, bluźniący, nieposłuszni rodzicom, niewdzięczni, niegodziwi, (3) bez serca, bezlitośni, miotający oszczerstwa, niepohamowani, bez uczuć ludzkich, nieprzychylni, (4) zdrajcy, zuchwali, nadęci, miłujący bardziej rozkosz niż Boga. (5) Będą okazywać pozór pobożności, ale wyrzekną się jej mocy. I od takich stroń. (6) Z takich bowiem są ci, co wślizgują się do domów i przeciągają na swą stronę kobietki obciążone grzechami, powodowane pożądaniami różnego rodzaju, (7) takie, co to zawsze się uczą, a nigdy nie mogą dojść do poznania prawdy. (8) Jak Jannes i Jambres wystąpili przeciw Mojżeszowi, tak też i ci przeciwstawiają się prawdzie, ludzie o spaczonym umyśle, którzy nie zdali egzaminu z wiary. Ale dalszego postępu nie osiągną: (9) bo ich bezmyślność będzie jawna dla wszystkich, jak i tamtych jawna się stała. (10) Ty natomiast poszedłeś śladem mojej nauki, sposobu życia, zamierzeń, wiary, cierpliwości, miłości, wytrwałości, (11) prześladowań, cierpień, jakie mnie spotkały w Antiochii, w Ikonium, w Listrze. Jakież to prześladowania zniosłem - a ze wszystkich wyrwał mnie Pan! (12) I wszystkich, którzy chcą żyć zbożnie w Chrystusie Jezusie, spotkają prześladowania. (13) Tymczasem ludzie źli i zwodziciele będą się dalej posuwać ku temu, co gorsze, błądząc i /innych/ w błąd wprowadzając. (14) Ty natomiast trwaj w tym, czego się nauczyłeś i co ci zawierzono, bo wiesz, od kogo się nauczyłeś. Od lat bowiem niemowlęcych znasz Pisma święte, (15) które mogą cię nauczyć mądrości wiodącej ku zbawieniu przez wiarę w Chrystusie Jezusie. (16) Wszelkie Pismo od Boga natchnione /jest/ i pożyteczne do nauczania, do przekonywania, do poprawiania, do kształcenia w sprawiedliwości - (17) aby człowiek Boży był doskonały, przysposobiony do każdego dobrego czynu. ')
        ->save();

//nauczanie
$teachings = Mage::getModel('jaro_bibleteacher/teachings')
        ->setCreatedAt('2016-12-22 00:00:00.000')
        ->setName('Grupa Biblijna 2Tm 3')
        ->setVerseId($teachingsVerse->getId())
        ->save();

//wersy glowne
$majorVerse_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(0)
        ->setStop(0)
        ->setContent('A wiedz o tym, że w dniach ostatnich nastaną chwile trudne.')
        ->save();

$majorVerse_1 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(1)
        ->setStop(1)
        ->setContent('Ludzie bowiem będą samolubni, chciwi, wyniośli, pyszni, bluźniący, nieposłuszni rodzicom, niewdzięczni, niegodziwi,')
        ->save();

$majorVerse_2 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(2)
        ->setStop(2)
        ->setContent('bez serca, bezlitośni, miotający oszczerstwa, niepohamowani, bez uczuć ludzkich, nieprzychylni,')
        ->save();

$majorVerse_3 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(3)
        ->setStop(3)
        ->setContent('zdrajcy, zuchwali, nadęci, miłujący bardziej rozkosz niż Boga.')
        ->save();

$majorVerse_4 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(4)
        ->setStop(4)
        ->setContent('Będą okazywać pozór pobożności, ale wyrzekną się jej mocy. I od takich stroń.')
        ->save();

$majorVerse_5 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(5)
        ->setStop(5)
        ->setContent('Z takich bowiem są ci, co wślizgują się do domów i przeciągają na swą stronę kobietki obciążone grzechami, powodowane pożądaniami różnego rodzaju,')
        ->save();

$majorVerse_6 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(6)
        ->setStop(6)
        ->setContent('takie, co to zawsze się uczą, a nigdy nie mogą dojść do poznania prawdy.')
        ->save();

$majorVerse_7 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(7)
        ->setStop(7)
        ->setContent('Jak Jannes i Jambres wystąpili przeciw Mojżeszowi, tak też i ci przeciwstawiają się prawdzie, ludzie o spaczonym umyśle, którzy nie zdali egzaminu z wiary. Ale dalszego postępu nie osiągną:')
        ->save();

$majorVerse_8 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(8)
        ->setStop(8)
        ->setContent('bo ich bezmyślność będzie jawna dla wszystkich, jak i tamtych jawna się stała.')
        ->save();

$majorVerse_9 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(9)
        ->setStop(9)
        ->setContent('Ty natomiast poszedłeś śladem mojej nauki, sposobu życia, zamierzeń, wiary, cierpliwości, miłości, wytrwałości,')
        ->save();

$majorVerse_10 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(10)
        ->setStop(10)
        ->setContent('prześladowań, cierpień, jakie mnie spotkały w Antiochii, w Ikonium, w Listrze. Jakież to prześladowania zniosłem - a ze wszystkich wyrwał mnie Pan!')
        ->save();

$majorVerse_11 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(11)
        ->setStop(11)
        ->setContent('I wszystkich, którzy chcą żyć zbożnie w Chrystusie Jezusie, spotkają prześladowania.')
        ->save();

$majorVerse_12 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(12)
        ->setStop(12)
        ->setContent('Tymczasem ludzie źli i zwodziciele będą się dalej posuwać ku temu, co gorsze, błądząc i /innych/ w błąd wprowadzając.')
        ->save();

$majorVerse_13 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(13)
        ->setStop(13)
        ->setContent('Ty natomiast trwaj w tym, czego się nauczyłeś i co ci zawierzono, bo wiesz, od kogo się nauczyłeś. Od lat bowiem niemowlęcych znasz Pisma święte,')
        ->save();

$majorVerse_14 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(14)
        ->setStop(14)
        ->setContent('które mogą cię nauczyć mądrości wiodącej ku zbawieniu przez wiarę w Chrystusie Jezusie.')
        ->save();

$majorVerse_15 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(15)
        ->setStop(15)
        ->setContent('Wszelkie Pismo od Boga natchnione /jest/ i pożyteczne do nauczania, do przekonywania, do poprawiania, do kształcenia w sprawiedliwości -')
        ->save();

$majorVerse_16 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($teachingsVerse->getId())
        ->setVersesType(2)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(2)
        ->setStart(16)
        ->setStop(16)
        ->setContent('aby człowiek Boży był doskonały, przysposobiony do każdego dobrego czynu.')
        ->save();

//wersy poboczne
$minorVerse_0_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_0->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('1tm')
        ->setChapter(3)
        ->setStart(0)
        ->setStop(0)
        ->setContent('Duch zaś otwarcie mówi, że w czasach ostatnich niektórzy odpadną od wiary, skłaniając się ku duchom zwodniczym i ku naukom demonów.')
        ->save();

$minorVerse_0_1 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_0->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2pe')
        ->setChapter(2)
        ->setStart(2)
        ->setStop(2)
        ->setContent('To przede wszystkim wiecie, że przyjdą w ostatnich dniach szydercy pełni szyderstwa, którzy będą postępowali według własnych żądz')
        ->save();

$minorVerse_0_2 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_0->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('jude')
        ->setChapter(0)
        ->setStart(17)
        ->setStop(17)
        ->setContent('gdy mówili do was, że w ostatnich czasach pojawią się szydercy, którzy będą postępowali według własnych pożądliwości.')
        ->save();

$minorVerse_0_3 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_0->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(3)
        ->setStart(2)
        ->setStop(2)
        ->setContent('Przyjdzie bowiem chwila, kiedy zdrowej nauki nie będą znosili, ale według własnych pożądań - ponieważ ich uszy świerzbią - będą sobie mnożyli nauczycieli.')
        ->save();

$minorVerse_1_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_1->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ro')
        ->setChapter(0)
        ->setStart(28)
        ->setStop(30)
        ->setContent('Pełni są też wszelakiej nieprawości, przewrotności, chciwości, niegodziwości. Oddani zazdrości, zabójstwu, waśniom, podstępowi, złośliwości;  potwarcy, oszczercy, nienawidzący Boga, zuchwali, pyszni, chełpliwi, w tym, co złe - pomysłowi, rodzicom nieposłuszni,  bezrozumni, niestali, bez serca, bez litości.')
        ->save();

$minorVerse_1_1 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_1->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('1tm')
        ->setChapter(0)
        ->setStart(8)
        ->setStop(8)
        ->setContent('rozumiejąc, że Prawo nie dla sprawiedliwego jest przeznaczone, ale dla postępujących bezprawnie i dla niesfornych, bezbożnych i grzeszników, dla niegodziwych i światowców, dla ojcobójców i matkobójców, dla zabójców,')
        ->save();

$minorVerse_1_2 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_1->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('1tm')
        ->setChapter(5)
        ->setStart(9)
        ->setStop(9)
        ->setContent('Albowiem korzeniem wszelkiego zła jest chciwość pieniędzy. Za nimi to uganiając się, niektórzy zabłąkali się z dala od wiary i siebie samych przeszyli wielu boleściami.')
        ->save();

$minorVerse_1_3 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_1->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2pe')
        ->setChapter(1)
        ->setStart(9)
        ->setStop(11)
        ->setContent('przede wszystkim zaś tych, którzy idą za ciałem w nieczystej żądzy i pogardę okazują Władzy, zuchwalcy, zarozumialcy, którzy nie wahają się przed wypowiadaniem bluźnierstw na "Chwały".  Tymczasem aniołowie, których siła i potęga jest większa, nie wnoszą przeciwko nim przed Pana przeklinającego wyroku potępienia.  Ci zaś, jak nierozumne zwierzęta, przeznaczone z natury na schwytanie i zagładę, wypowiadając bluźnierstwa na to, czego nie znają, podlegną właśnie takiej zagładzie jak one,')
        ->save();

$minorVerse_3_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_3->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ps')
        ->setChapter(24)
        ->setStart(2)
        ->setStop(2)
        ->setContent('Nikt bowiem, kto Tobie ufa, nie doznaje wstydu; doznają wstydu ci, którzy łamią wiarę dla marności.')
        ->save();

$minorVerse_3_1 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_3->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('jn')
        ->setChapter(5)
        ->setStart(70)
        ->setStop(70)
        ->setContent('Mówił zaś o Judaszu, synu Szymona Iskarioty. Ten bowiem - jeden z Dwunastu - miał Go wydać.')
        ->save();

$minorVerse_3_2 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_3->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ac')
        ->setChapter(6)
        ->setStart(51)
        ->setStop(51)
        ->setContent('Któregoż z proroków nie prześladowali wasi ojcowie? Pozabijali nawet tych, którzy przepowiadali przyjście Sprawiedliwego. A wyście zdradzili Go teraz i zamordowali.')
        ->save();

$minorVerse_3_3 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_3->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('1tm')
        ->setChapter(2)
        ->setStart(5)
        ->setStop(5)
        ->setContent('Nie [może być] świeżo ochrzczony, ażeby wbiwszy się w pychę nie wpadł w diabelskie potępienie.')
        ->save();

$minorVerse_3_4 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_3->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('1tm')
        ->setChapter(5)
        ->setStart(3)
        ->setStop(3)
        ->setContent('jest nadęty, niczego nie pojmuje, lecz choruje na dociekania i słowne utarczki. Z nich rodzą się: zawiść, sprzeczka, bluźnierstwa, złośliwe podejrzenia,')
        ->save();

$minorVerse_3_5 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_3->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('jas')
        ->setChapter(4)
        ->setStart(4)
        ->setStop(4)
        ->setContent('Żyliście beztrosko na ziemi i wśród dostatków tuczyliście serca wasze w dniu rzezi.')
        ->save();

$minorVerse_3_6 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_3->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('php')
        ->setChapter(2)
        ->setStart(18)
        ->setStop(18)
        ->setContent('Ich losem - zagłada, ich bogiem - brzuch, a chwała - w tym, czego winni się wstydzić. To ci, których dążenia są przyziemne.')
        ->save();

$minorVerse_4_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_4->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('mt')
        ->setChapter(6)
        ->setStart(14)
        ->setStop(14)
        ->setContent('Strzeżcie się fałszywych proroków, którzy przychodzą do was w owczej skórze, a wewnątrz są drapieżnymi wilkami.')
        ->save();

$minorVerse_4_1 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_4->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('mt')
        ->setChapter(6)
        ->setStart(20)
        ->setStop(20)
        ->setContent('Nie każdy, który Mi mówi: Panie, Panie!, wejdzie do królestwa niebieskiego, lecz ten, kto spełnia wolę mojego Ojca, który jest w niebie.')
        ->save();

$minorVerse_4_2 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_4->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ro')
        ->setChapter(1)
        ->setStart(19)
        ->setStop(22)
        ->setContent('wychowawcą nieumiejętnych, nauczycielem prostaczków, mającym w Prawie wyraz wszelkiej wiedzy i prawdy...  Ty, który uczysz drugich, sam siebie nie uczysz. Głosisz, że nie wolno kraść, a kradniesz.  Mówiąc, że nie wolno cudzołożyć, cudzołożysz? Który brzydzisz się bożkami, okradasz świątynie?  Ty, który chlubisz się Prawem, przez przekraczanie Prawa znieważasz Boga.')
        ->save();

$minorVerse_4_3 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_4->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('tyt')
        ->setChapter(0)
        ->setStart(15)
        ->setStop(15)
        ->setContent('Twierdzą, że znają Boga, uczynkami zaś temu przeczą, będąc ludźmi obrzydliwymi, zbuntowanymi i niezdolnymi do żadnego dobrego czynu.')
        ->save();

$minorVerse_4_4 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_4->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ro')
        ->setChapter(15)
        ->setStart(16)
        ->setStop(16)
        ->setContent('Proszę was jeszcze, bracia, strzeżcie się tych, którzy wzniecają spory i zgorszenia przeciw nauce, którą otrzymaliście. Strońcie od nich.')
        ->save();

$minorVerse_4_5 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_4->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('1tm')
        ->setChapter(5)
        ->setStart(10)
        ->setStop(10)
        ->setContent('Ty natomiast, o człowiecze Boży, uciekaj od tego rodzaju rzeczy, a podążaj za sprawiedliwością, pobożnością, wiarą, miłością, wytrwałością, łagodnością!')
        ->save();

$minorVerse_4_6 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_4->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('1tm')
        ->setChapter(5)
        ->setStart(19)
        ->setStop(19)
        ->setContent('O, Tymoteuszu, strzeż depozytu [wiary] unikając światowej czczej gadaniny i przeciwstawnych twierdzeń rzekomej wiedzy,')
        ->save();

$minorVerse_4_7 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_4->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(1)
        ->setStart(15)
        ->setStop(15)
        ->setContent('Unikaj zaś światowej gadaniny; albowiem uprawiający ją coraz bardziej będą się zbliżać ku bezbożności,')
        ->save();

$minorVerse_4_8 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_4->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(1)
        ->setStart(21)
        ->setStop(21)
        ->setContent('Uciekaj zaś przed młodzieńczymi pożądaniami, a zabiegaj o sprawiedliwość, wiarę, miłość, pokój - wraz z tymi, którzy wzywają Pana czystym sercem.')
        ->save();

$minorVerse_4_9 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_4->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('tyt')
        ->setChapter(2)
        ->setStart(8)
        ->setStop(8)
        ->setContent('Unikaj natomiast głupich dociekań, rodowodów, sporów i kłótni o Prawo [Mojżeszowe]! Są bowiem bezużyteczne i puste.')
        ->save();

$minorVerse_5_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_5->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('tyt')
        ->setChapter(0)
        ->setStart(10)
        ->setStop(10)
        ->setContent('trzeba im zamknąć usta, gdyż całe domy skłócają, nauczając, czego nie należy, dla nędznego zysku.')
        ->save();

$minorVerse_5_1 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_5->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('jude')
        ->setChapter(0)
        ->setStart(3)
        ->setStop(3)
        ->setContent('Wkradli się bowiem pomiędzy was jacyś ludzie, którzy dawno już są zapisani na to potępienie, bezbożni, którzy łaskę Boga naszego zamieniają na rozpustę, a nawet wypierają się jedynego Władcy i Pana naszego Jezusa Chrystusa.')
        ->save();

$minorVerse_5_2 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_5->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('mk')
        ->setChapter(11)
        ->setStart(39)
        ->setStop(39)
        ->setContent('Objadają domy wdów i dla pozoru odprawiają długie modlitwy. Ci tym surowszy dostaną wyrok.')
        ->save();

$minorVerse_5_3 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_5->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('lk')
        ->setChapter(19)
        ->setStart(46)
        ->setStop(46)
        ->setContent('Objadają oni domy wdów i dla pozoru długo się modlą. Ci tym surowszy dostaną wyrok.')
        ->save();

$minorVerse_5_4 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_5->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('tyt')
        ->setChapter(2)
        ->setStart(2)
        ->setStop(2)
        ->setContent('Niegdyś bowiem i my byliśmy nierozumni, oporni, błądzący, służyliśmy różnym żądzom i rozkoszom, żyjąc w złości i zawiści, godni obrzydzenia, pełni nienawiści jedni ku drugim.')
        ->save();

$minorVerse_6_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_6->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('1tm')
        ->setChapter(1)
        ->setStart(3)
        ->setStop(3)
        ->setContent('który pragnie, by wszyscy ludzie zostali zbawieni i doszli do poznania prawdy.')
        ->save();

$minorVerse_6_1 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_6->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(1)
        ->setStart(24)
        ->setStop(24)
        ->setContent('Powinien z łagodnością pouczać wrogo usposobionych, bo może Bóg da im kiedyś nawrócenie do poznania prawdy')
        ->save();

$minorVerse_7_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_7->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ac')
        ->setChapter(12)
        ->setStart(7)
        ->setStop(7)
        ->setContent('Lecz przeciwstawił się im Elimas - mag /tak bowiem tłumaczy się jego imię/, usiłując odwieść prokonsula od wiary.')
        ->save();

$minorVerse_7_1 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_7->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ex')
        ->setChapter(6)
        ->setStart(10)
        ->setStop(21)
        ->setContent('Faraon wówczas kazał przywołać mędrców i czarowników, a wróżbici egipscy uczynili to samo dzięki swej tajemnej wiedzy.  I rzucił każdy z nich laskę, i zamieniły się w węże. Jednak laska Aarona połknęła ich laski.  Mimo to serce faraona pozostało uparte i nie usłuchał ich, jak zapowiedział Pan.  Rzekł Pan do Mojżesza: Serce faraona jest twarde, wzbrania się wypuścić lud.  Idź do faraona rano, gdy wyjdzie nad wodę, pośpiesz mu na spotkanie na brzeg Nilu. Weź do ręki laskę, która zamieniła się w węża.  Powiedz mu: Pan, Bóg Hebrajczyków, posłał mnie do ciebie z rozkazem: Wypuść lud mój, by Mi oddał cześć na pustyni! Oto dotąd nie posłuchałeś Mnie.  Tak mówi Pan: Po tym poznasz, że Ja jestem Panem. Oto uderzę laską, którą mam w ręce, wody Nilu, a zamienią się w krew.  Ryby Nilu poginą, a Nil wydawać będzie przykrą woń, tak że Egipcjanie nie będą mogli pić wody z Nilu.  Pan powiedział do Mojżesza: Mów do Aarona: Weź laskę swoją i wyciągnij rękę na wody Egiptu, na jego rzeki i na jego kanały, i na jego stawy, i na wszelkie jego zbiorowiska wód, a zamienią się w krew. I będzie krew w całej ziemi egipskiej, w naczyniach drewnianych i kamiennych.  Mojżesz i Aaron uczynili tak, jak nakazał Pan. Aaron podniósł laskę i uderzył nią wody Nilu na oczach faraona i sług jego. Woda Nilu zamieniła się w krew.  Ryby rzeki wyginęły, a Nil zaczął wydawać przykrą woń, tak że Egipcjanie nie mogli pić wody z Nilu. Krew była w całym kraju egipskim.  Lecz to samo uczynili czarownicy egipscy dzięki swej wiedzy tajemnej. Pozostało więc uparte serce faraona, i nie usłuchał ich, jak to Pan zapowiedział.')
        ->save();

$minorVerse_7_2 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_7->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(1)
        ->setStart(24)
        ->setStop(24)
        ->setContent('Powinien z łagodnością pouczać wrogo usposobionych, bo może Bóg da im kiedyś nawrócenie do poznania prawdy')
        ->save();

$minorVerse_7_3 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_7->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('1tm')
        ->setChapter(5)
        ->setStart(4)
        ->setStop(4)
        ->setContent('ciągłe spory ludzi o wypaczonym umyśle i którym brak prawdy - ludzi, którzy uważają, że pobożność jest źródłem zysku.')
        ->save();

$minorVerse_7_4 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_7->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('1co')
        ->setChapter(8)
        ->setStart(26)
        ->setStop(26)
        ->setContent('lecz poskramiam moje ciało i biorę je w niewolę, abym innym głosząc naukę, sam przypadkiem nie został uznany za niezdatnego.')
        ->save();

$minorVerse_7_5 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_7->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2co')
        ->setChapter(12)
        ->setStart(4)
        ->setStop(4)
        ->setContent('Siebie samych badajcie, czy trwacie w wierze; siebie samych doświadczajcie! Czyż nie wiecie o samych sobie, że Jezus Chrystus jest w was? Chyba żeście odrzuceni.')
        ->save();

$minorVerse_7_6 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_7->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('1tm')
        ->setChapter(0)
        ->setStart(3)
        ->setStop(3)
        ->setContent('a także zajmowania się baśniami i genealogiami bez końca. Służą one raczej dalszym dociekaniom niż planowi Bożemu zgodnie z wiarą.')
        ->save();

$minorVerse_8_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_8->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(1)
        ->setStart(15)
        ->setStop(15)
        ->setContent('Unikaj zaś światowej gadaniny; albowiem uprawiający ją coraz bardziej będą się zbliżać ku bezbożności,')
        ->save();

$minorVerse_9_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_9->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('1tm')
        ->setChapter(3)
        ->setStart(5)
        ->setStop(5)
        ->setContent('Przedkładając to braciom, będziesz dobrym sługą Chrystusa Jezusa, karmionym słowami wiary i dobrej nauki, za którą poszedłeś.')
        ->save();

$minorVerse_10_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_10->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ac')
        ->setChapter(11)
        ->setStart(9)
        ->setStop(9)
        ->setContent('Minęli pierwszą i drugą straż i doszli do żelaznej bramy, prowadzącej do miasta. Ta otwarła się sama przed nimi. Wyszli więc, przeszli jedną ulicę i natychmiast anioł odstąpił od niego.')
        ->save();

$minorVerse_10_1 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_10->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ac')
        ->setChapter(12)
        ->setStart(13)
        ->setStop(13)
        ->setContent('Oni zaś przeszli przez Perge, dotarli do Antiochii Pizydyjskiej, weszli w dzień sobotni do synagogi i usiedli.')
        ->save();

$minorVerse_10_2 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_10->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ac')
        ->setChapter(13)
        ->setStart(0)
        ->setStop(4)
        ->setContent('W Ikonium weszli tak samo do synagogi żydowskiej i przemawiali, tak że wielka liczba Żydów i pogan uwierzyła.  Ale ci Żydzi, którzy nie uwierzyli, podburzali i źle usposobili pogan wobec braci.  Pozostali tam dość długi czas i nauczali odważnie, ufni w Pana, który potwierdzał słowo swej łaski cudami i znakami, dokonywanymi przez ich ręce.  I podzielili się mieszkańcy miasta: jedni byli z Żydami, a drudzy z apostołami.  Gdy jednak dowiedzieli się, że poganie i Żydzi wraz ze swymi władzami zamierzają ich znieważyć i ukamienować,')
        ->save();

$minorVerse_10_3 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_10->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ac')
        ->setChapter(13)
        ->setStart(5)
        ->setStop(5)
        ->setContent('uciekli do miast Likaonii: do Listry i Derbe oraz w ich okolice,')
        ->save();

$minorVerse_10_4 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_10->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ac')
        ->setChapter(13)
        ->setStart(18)
        ->setStop(18)
        ->setContent('Tymczasem nadeszli Żydzi z Antiochii i z Ikonium. Podburzyli tłum, ukamienowali Pawła i wywlekli go za miasto, sądząc, że nie żyje.')
        ->save();

$minorVerse_10_5 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_10->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ps')
        ->setChapter(33)
        ->setStart(19)
        ->setStop(19)
        ->setContent('Wiele nieszczęść [spada na] sprawiedliwego; lecz ze wszystkich Pan go wybawia.')
        ->save();

$minorVerse_10_6 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_10->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ro')
        ->setChapter(14)
        ->setStart(30)
        ->setStop(30)
        ->setContent('abym wyszedł cało z rąk niewiernych w Judei i by moja posługa na rzecz Jerozolimy została dobrze przyjęta przez świętych')
        ->save();

$minorVerse_10_7 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_10->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(3)
        ->setStart(16)
        ->setStop(17)
        ->setContent('Natomiast Pan stanął przy mnie i wzmocnił mię, żeby się przeze mnie dopełniło głoszenie /Ewangelii/ i żeby wszystkie narody /je/ posłyszały; wyrwany też zostałem z paszczy lwa.  Wyrwie mię Pan od wszelkiego złego czynu i wybawi mię, przyjmując do swego królestwa niebieskiego; Jemu chwała na wieki wieków! Amen.')
        ->save();

$minorVerse_11_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_11->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('mt')
        ->setChapter(4)
        ->setStart(9)
        ->setStop(11)
        ->setContent('Błogosławieni, którzy cierpią prześladowanie dla sprawiedliwości, albowiem do nich należy królestwo niebieskie.  Błogosławieni jesteście, gdy /ludzie/ wam urągają i prześladują was, i gdy z mego powodu mówią kłamliwie wszystko złe na was.  Cieszcie się i radujcie, albowiem wasza nagroda wielka jest w niebie. Tak bowiem prześladowali proroków, którzy byli przed wami.')
        ->save();

$minorVerse_11_1 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_11->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('mt')
        ->setChapter(9)
        ->setStart(21)
        ->setStop(21)
        ->setContent('Będziecie w nienawiści u wszystkich z powodu mego imienia. Lecz kto wytrwa do końca, ten będzie zbawiony.')
        ->save();

$minorVerse_11_2 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_11->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('jn')
        ->setChapter(14)
        ->setStart(19)
        ->setStop(19)
        ->setContent('Pamiętajcie na słowo, które do was powiedziałem: Sługa nie jest większy od swego pana. Jeżeli Mnie prześladowali, to i was będą prześladować. Jeżeli moje słowo zachowali, to i wasze będą zachowywać.')
        ->save();

$minorVerse_11_3 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_11->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ac')
        ->setChapter(13)
        ->setStart(21)
        ->setStop(21)
        ->setContent('Umacniając dusze uczniów, zachęcając do wytrwania w wierze, bo przez wiele ucisków trzeba nam wejść do królestwa Bożego.')
        ->save();

$minorVerse_11_4 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_11->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('php')
        ->setChapter(0)
        ->setStart(28)
        ->setStop(28)
        ->setContent('Wam bowiem z łaski dane jest to dla Chrystusa: nie tylko w Niego wierzyć, ale i dla Niego cierpieć,')
        ->save();

$minorVerse_12_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_12->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('1tm')
        ->setChapter(3)
        ->setStart(0)
        ->setStop(0)
        ->setContent('Duch zaś otwarcie mówi, że w czasach ostatnich niektórzy odpadną od wiary, skłaniając się ku duchom zwodniczym i ku naukom demonów.')
        ->save();

$minorVerse_12_1 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_12->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('tyt')
        ->setChapter(0)
        ->setStart(9)
        ->setStop(9)
        ->setContent('Jest bowiem wielu krnąbrnych, gadatliwych i zwodzicieli, zwłaszcza wśród obrzezanych:')
        ->save();

$minorVerse_13_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_13->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(1)
        ->setStart(1)
        ->setStop(1)
        ->setContent('co usłyszałeś ode mnie za pośrednictwem wielu świadków, przekaż zasługującym na wiarę ludziom, którzy też będą zdolni nauczać i innych.')
        ->save();

$minorVerse_14_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_14->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('deu')
        ->setChapter(3)
        ->setStart(5)
        ->setStop(5)
        ->setContent('Strzeżcie ich i wypełniajcie je, bo one są waszą mądrością i umiejętnością w oczach narodów, które usłyszawszy o tych prawach powiedzą: Z pewnością ten wielki naród to lud mądry i rozumny.')
        ->save();

$minorVerse_14_1 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_14->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ps')
        ->setChapter(118)
        ->setStart(97)
        ->setStop(98)
        ->setContent('Twoje przykazanie uczyniło mnie mędrszym od moich wrogów, bo jest ono moim na wieki.  Jestem roztropniejszy od wszystkich, którzy mnie uczą, bo rozmyślam o Twoich napomnieniach.')
        ->save();

$minorVerse_14_2 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_14->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('jn')
        ->setChapter(4)
        ->setStart(2)
        ->setStop(8)
        ->setContent('Wśród nich leżało mnóstwo chorych: niewidomych, chromych, sparaliżowanych, /którzy czekali na poruszenie się wody.  Anioł bowiem zstępował w stosownym czasie i poruszał wodę. A kto pierwszy wchodził po poruszeniu się wody, doznawał uzdrowienia niezależnie od tego, na jaką cierpiał chorobę/.  Znajdował się tam pewien człowiek, który już od lat trzydziestu ośmiu cierpiał na swoją chorobę.  Gdy Jezus ujrzał go leżącego i poznał, że czeka już długi czas, rzekł do niego: Czy chcesz stać się zdrowym?  Odpowiedział Mu chory: Panie, nie mam człowieka, aby mnie wprowadził do sadzawki, gdy nastąpi poruszenie wody. Gdy ja sam już dochodzę, inny wchodzi przede mną.  Rzekł do niego Jezus: Wstań, weź swoje łoże i chodź!  Natychmiast wyzdrowiał ów człowiek, wziął swoje łoże i chodził. Jednakże dnia tego był szabat.')
        ->save();

$minorVerse_14_3 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_14->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(0)
        ->setStart(4)
        ->setStop(4)
        ->setContent('na wspomnienie bezobłudnej wiary, jaka jest w tobie; ona to zamieszkała pierwej w twojej babce Lois i w twej matce Eunice, a pewien jestem, że /mieszka/ i w tobie.')
        ->save();

$minorVerse_15_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_15->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2pe')
        ->setChapter(0)
        ->setStart(20)
        ->setStop(20)
        ->setContent('Nie z woli bowiem ludzkiej zostało kiedyś przyniesione proroctwo, ale kierowani Duchem Świętym mówili /od Boga/ święci ludzie.')
        ->save();

$minorVerse_15_1 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_15->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('ro')
        ->setChapter(14)
        ->setStart(3)
        ->setStop(3)
        ->setContent('To zaś, co niegdyś zostało napisane, napisane zostało i dla naszego pouczenia, abyśmy dzięki cierpliwości i pociesze, jaką niosą Pisma, podtrzymywali nadzieję.')
        ->save();

$minorVerse_15_2 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_15->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('eph')
        ->setChapter(5)
        ->setStart(3)
        ->setStop(3)
        ->setContent('A [wy], ojcowie, nie pobudzajcie do gniewu waszych dzieci, lecz wychowujcie je stosując karcenie i napominanie Pańskie!')
        ->save();

$minorVerse_16_0 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_16->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('2tm')
        ->setChapter(1)
        ->setStart(20)
        ->setStop(20)
        ->setContent('Jeśliby więc ktoś oczyścił siebie samego z tego wszystkiego, będzie naczyniem zaszczytnym, poświęconym, pożytecznym dla właściciela, przygotowanym do każdego dobrego czynu.')
        ->save();

$minorVerse_16_1 = 
    Mage::getModel('jaro_bibleteacher/verses')
        ->setParentId($majorVerse_16->getId())
        ->setVersesType(3)
        ->setTranslationId(1)
        ->setNumberingId(2)
        ->setBook('hebr')
        ->setChapter(12)
        ->setStart(20)
        ->setStop(20)
        ->setContent('niech was uzdolni do wszelkiego dobra, byście czynili Jego wolę, sprawując w was, co miłe jest w oczach Jego, przez Jezusa Chrystusa, któremu chwała na wieki wieków! Amen.')
        ->save();

$installer->endSetup();