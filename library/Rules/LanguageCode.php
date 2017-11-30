<?php

/*
 * This file is part of Respect/Validation.
 *
 * (c) Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Respect\Validation\Rules;

use Respect\Validation\Exceptions\ComponentException;

/**
 * Validates languages in ISO 639.
 */
class LanguageCode extends AbstractRule
{
    const ALPHA2 = 'alpha-2';
    const ALPHA3 = 'alpha-3';

    /**
     * @link http://www.loc.gov/standards/iso639-2/ISO-639-2_utf-8.txt
     *
     * @var array
     */
    protected $languageCodeList = array(
        array('AA', '﻿AAR'), // AFAR
        array('AB', 'ABK'), // ABKHAZIAN
        array('', 'ACE'), // ACHINESE
        array('', 'ACH'), // ACOLI
        array('', 'ADA'), // ADANGME
        array('', 'ADY'), // ADYGHE; ADYGEI
        array('', 'AFA'), // AFRO-ASIATIC LANGUAGES
        array('', 'AFH'), // AFRIHILI
        array('AF', 'AFR'), // AFRIKAANS
        array('', 'AIN'), // AINU
        array('AK', 'AKA'), // AKAN
        array('', 'AKK'), // AKKADIAN
        array('SQ', 'ALB'), // ALBANIAN
        array('', 'ALE'), // ALEUT
        array('', 'ALG'), // ALGONQUIAN LANGUAGES
        array('', 'ALT'), // SOUTHERN ALTAI
        array('AM', 'AMH'), // AMHARIC
        array('', 'ANG'), // ENGLISH, OLD (CA.450-1100)
        array('', 'ANP'), // ANGIKA
        array('', 'APA'), // APACHE LANGUAGES
        array('AR', 'ARA'), // ARABIC
        array('', 'ARC'), // OFFICIAL ARAMAIC (700-300 BCE); IMPERIAL ARAMAIC (700-300 BCE)
        array('AN', 'ARG'), // ARAGONESE
        array('HY', 'ARM'), // ARMENIAN
        array('', 'ARN'), // MAPUDUNGUN; MAPUCHE
        array('', 'ARP'), // ARAPAHO
        array('', 'ART'), // ARTIFICIAL LANGUAGES
        array('', 'ARW'), // ARAWAK
        array('AS', 'ASM'), // ASSAMESE
        array('', 'AST'), // ASTURIAN; BABLE; LEONESE; ASTURLEONESE
        array('', 'ATH'), // ATHAPASCAN LANGUAGES
        array('', 'AUS'), // AUSTRALIAN LANGUAGES
        array('AV', 'AVA'), // AVARIC
        array('AE', 'AVE'), // AVESTAN
        array('', 'AWA'), // AWADHI
        array('AY', 'AYM'), // AYMARA
        array('AZ', 'AZE'), // AZERBAIJANI
        array('', 'BAD'), // BANDA LANGUAGES
        array('', 'BAI'), // BAMILEKE LANGUAGES
        array('BA', 'BAK'), // BASHKIR
        array('', 'BAL'), // BALUCHI
        array('BM', 'BAM'), // BAMBARA
        array('', 'BAN'), // BALINESE
        array('EU', 'BAQ'), // BASQUE
        array('', 'BAS'), // BASA
        array('', 'BAT'), // BALTIC LANGUAGES
        array('', 'BEJ'), // BEJA; BEDAWIYET
        array('BE', 'BEL'), // BELARUSIAN
        array('', 'BEM'), // BEMBA
        array('BN', 'BEN'), // BENGALI
        array('', 'BER'), // BERBER LANGUAGES
        array('', 'BHO'), // BHOJPURI
        array('BH', 'BIH'), // BIHARI LANGUAGES
        array('', 'BIK'), // BIKOL
        array('', 'BIN'), // BINI; EDO
        array('BI', 'BIS'), // BISLAMA
        array('', 'BLA'), // SIKSIKA
        array('', 'BNT'), // BANTU (OTHER)
        array('BS', 'BOS'), // BOSNIAN
        array('', 'BRA'), // BRAJ
        array('BR', 'BRE'), // BRETON
        array('', 'BTK'), // BATAK LANGUAGES
        array('', 'BUA'), // BURIAT
        array('', 'BUG'), // BUGINESE
        array('BG', 'BUL'), // BULGARIAN
        array('MY', 'BUR'), // BURMESE
        array('', 'BYN'), // BLIN; BILIN
        array('', 'CAD'), // CADDO
        array('', 'CAI'), // CENTRAL AMERICAN INDIAN LANGUAGES
        array('', 'CAR'), // GALIBI CARIB
        array('CA', 'CAT'), // CATALAN; VALENCIAN
        array('', 'CAU'), // CAUCASIAN LANGUAGES
        array('', 'CEB'), // CEBUANO
        array('', 'CEL'), // CELTIC LANGUAGES
        array('CH', 'CHA'), // CHAMORRO
        array('', 'CHB'), // CHIBCHA
        array('CE', 'CHE'), // CHECHEN
        array('', 'CHG'), // CHAGATAI
        array('ZH', 'CHI'), // CHINESE
        array('', 'CHK'), // CHUUKESE
        array('', 'CHM'), // MARI
        array('', 'CHN'), // CHINOOK JARGON
        array('', 'CHO'), // CHOCTAW
        array('', 'CHP'), // CHIPEWYAN; DENE SULINE
        array('', 'CHR'), // CHEROKEE
        array('CU', 'CHU'), // CHURCH SLAVIC; OLD SLAVONIC; CHURCH SLAVONIC; OLD BULGARIAN; OLD CHURCH SLAVONIC
        array('CV', 'CHV'), // CHUVASH
        array('', 'CHY'), // CHEYENNE
        array('', 'CMC'), // CHAMIC LANGUAGES
        array('', 'COP'), // COPTIC
        array('KW', 'COR'), // CORNISH
        array('CO', 'COS'), // CORSICAN
        array('', 'CPE'), // CREOLES AND PIDGINS, ENGLISH BASED
        array('', 'CPF'), // CREOLES AND PIDGINS, FRENCH-BASED
        array('', 'CPP'), // CREOLES AND PIDGINS, PORTUGUESE-BASED
        array('CR', 'CRE'), // CREE
        array('', 'CRH'), // CRIMEAN TATAR; CRIMEAN TURKISH
        array('', 'CRP'), // CREOLES AND PIDGINS
        array('', 'CSB'), // KASHUBIAN
        array('', 'CUS'), // CUSHITIC LANGUAGES
        array('CS', 'CZE'), // CZECH
        array('', 'DAK'), // DAKOTA
        array('DA', 'DAN'), // DANISH
        array('', 'DAR'), // DARGWA
        array('', 'DAY'), // LAND DAYAK LANGUAGES
        array('', 'DEL'), // DELAWARE
        array('', 'DEN'), // SLAVE (ATHAPASCAN)
        array('', 'DGR'), // DOGRIB
        array('', 'DIN'), // DINKA
        array('DV', 'DIV'), // DIVEHI; DHIVEHI; MALDIVIAN
        array('', 'DOI'), // DOGRI
        array('', 'DRA'), // DRAVIDIAN LANGUAGES
        array('', 'DSB'), // LOWER SORBIAN
        array('', 'DUA'), // DUALA
        array('', 'DUM'), // DUTCH, MIDDLE (CA.1050-1350)
        array('NL', 'DUT'), // DUTCH; FLEMISH
        array('', 'DYU'), // DYULA
        array('DZ', 'DZO'), // DZONGKHA
        array('', 'EFI'), // EFIK
        array('', 'EGY'), // EGYPTIAN (ANCIENT)
        array('', 'EKA'), // EKAJUK
        array('', 'ELX'), // ELAMITE
        array('EN', 'ENG'), // ENGLISH
        array('', 'ENM'), // ENGLISH, MIDDLE (1100-1500)
        array('EO', 'EPO'), // ESPERANTO
        array('ET', 'EST'), // ESTONIAN
        array('EE', 'EWE'), // EWE
        array('', 'EWO'), // EWONDO
        array('', 'FAN'), // FANG
        array('FO', 'FAO'), // FAROESE
        array('', 'FAT'), // FANTI
        array('FJ', 'FIJ'), // FIJIAN
        array('', 'FIL'), // FILIPINO; PILIPINO
        array('FI', 'FIN'), // FINNISH
        array('', 'FIU'), // FINNO-UGRIAN LANGUAGES
        array('', 'FON'), // FON
        array('FR', 'FRE'), // FRENCH
        array('', 'FRM'), // FRENCH, MIDDLE (CA.1400-1600)
        array('', 'FRO'), // FRENCH, OLD (842-CA.1400)
        array('', 'FRR'), // NORTHERN FRISIAN
        array('', 'FRS'), // EASTERN FRISIAN
        array('FY', 'FRY'), // WESTERN FRISIAN
        array('FF', 'FUL'), // FULAH
        array('', 'FUR'), // FRIULIAN
        array('', 'GAA'), // GA
        array('', 'GAY'), // GAYO
        array('', 'GBA'), // GBAYA
        array('', 'GEM'), // GERMANIC LANGUAGES
        array('KA', 'GEO'), // GEORGIAN
        array('DE', 'GER'), // GERMAN
        array('', 'GEZ'), // GEEZ
        array('', 'GIL'), // GILBERTESE
        array('GD', 'GLA'), // GAELIC; SCOTTISH GAELIC
        array('GA', 'GLE'), // IRISH
        array('GL', 'GLG'), // GALICIAN
        array('GV', 'GLV'), // MANX
        array('', 'GMH'), // GERMAN, MIDDLE HIGH (CA.1050-1500)
        array('', 'GOH'), // GERMAN, OLD HIGH (CA.750-1050)
        array('', 'GON'), // GONDI
        array('', 'GOR'), // GORONTALO
        array('', 'GOT'), // GOTHIC
        array('', 'GRB'), // GREBO
        array('', 'GRC'), // GREEK, ANCIENT (TO 1453)
        array('EL', 'GRE'), // GREEK, MODERN (1453-)
        array('GN', 'GRN'), // GUARANI
        array('', 'GSW'), // SWISS GERMAN; ALEMANNIC; ALSATIAN
        array('GU', 'GUJ'), // GUJARATI
        array('', 'GWI'), // GWICH'IN
        array('', 'HAI'), // HAIDA
        array('HT', 'HAT'), // HAITIAN; HAITIAN CREOLE
        array('HA', 'HAU'), // HAUSA
        array('', 'HAW'), // HAWAIIAN
        array('HE', 'HEB'), // HEBREW
        array('HZ', 'HER'), // HERERO
        array('', 'HIL'), // HILIGAYNON
        array('', 'HIM'), // HIMACHALI LANGUAGES; WESTERN PAHARI LANGUAGES
        array('HI', 'HIN'), // HINDI
        array('', 'HIT'), // HITTITE
        array('', 'HMN'), // HMONG; MONG
        array('HO', 'HMO'), // HIRI MOTU
        array('HR', 'HRV'), // CROATIAN
        array('', 'HSB'), // UPPER SORBIAN
        array('HU', 'HUN'), // HUNGARIAN
        array('', 'HUP'), // HUPA
        array('', 'IBA'), // IBAN
        array('IG', 'IBO'), // IGBO
        array('IS', 'ICE'), // ICELANDIC
        array('IO', 'IDO'), // IDO
        array('II', 'III'), // SICHUAN YI; NUOSU
        array('', 'IJO'), // IJO LANGUAGES
        array('IU', 'IKU'), // INUKTITUT
        array('IE', 'ILE'), // INTERLINGUE; OCCIDENTAL
        array('', 'ILO'), // ILOKO
        array('IA', 'INA'), // INTERLINGUA (INTERNATIONAL AUXILIARY LANGUAGE ASSOCIATION)
        array('', 'INC'), // INDIC LANGUAGES
        array('ID', 'IND'), // INDONESIAN
        array('', 'INE'), // INDO-EUROPEAN LANGUAGES
        array('', 'INH'), // INGUSH
        array('IK', 'IPK'), // INUPIAQ
        array('', 'IRA'), // IRANIAN LANGUAGES
        array('', 'IRO'), // IROQUOIAN LANGUAGES
        array('IT', 'ITA'), // ITALIAN
        array('JV', 'JAV'), // JAVANESE
        array('', 'JBO'), // LOJBAN
        array('JA', 'JPN'), // JAPANESE
        array('', 'JPR'), // JUDEO-PERSIAN
        array('', 'JRB'), // JUDEO-ARABIC
        array('', 'KAA'), // KARA-KALPAK
        array('', 'KAB'), // KABYLE
        array('', 'KAC'), // KACHIN; JINGPHO
        array('KL', 'KAL'), // KALAALLISUT; GREENLANDIC
        array('', 'KAM'), // KAMBA
        array('KN', 'KAN'), // KANNADA
        array('', 'KAR'), // KAREN LANGUAGES
        array('KS', 'KAS'), // KASHMIRI
        array('KR', 'KAU'), // KANURI
        array('', 'KAW'), // KAWI
        array('KK', 'KAZ'), // KAZAKH
        array('', 'KBD'), // KABARDIAN
        array('', 'KHA'), // KHASI
        array('', 'KHI'), // KHOISAN LANGUAGES
        array('KM', 'KHM'), // CENTRAL KHMER
        array('', 'KHO'), // KHOTANESE; SAKAN
        array('KI', 'KIK'), // KIKUYU; GIKUYU
        array('RW', 'KIN'), // KINYARWANDA
        array('KY', 'KIR'), // KIRGHIZ; KYRGYZ
        array('', 'KMB'), // KIMBUNDU
        array('', 'KOK'), // KONKANI
        array('KV', 'KOM'), // KOMI
        array('KG', 'KON'), // KONGO
        array('KO', 'KOR'), // KOREAN
        array('', 'KOS'), // KOSRAEAN
        array('', 'KPE'), // KPELLE
        array('', 'KRC'), // KARACHAY-BALKAR
        array('', 'KRL'), // KARELIAN
        array('', 'KRO'), // KRU LANGUAGES
        array('', 'KRU'), // KURUKH
        array('KJ', 'KUA'), // KUANYAMA; KWANYAMA
        array('', 'KUM'), // KUMYK
        array('KU', 'KUR'), // KURDISH
        array('', 'KUT'), // KUTENAI
        array('', 'LAD'), // LADINO
        array('', 'LAH'), // LAHNDA
        array('', 'LAM'), // LAMBA
        array('LO', 'LAO'), // LAO
        array('LA', 'LAT'), // LATIN
        array('LV', 'LAV'), // LATVIAN
        array('', 'LEZ'), // LEZGHIAN
        array('LI', 'LIM'), // LIMBURGAN; LIMBURGER; LIMBURGISH
        array('LN', 'LIN'), // LINGALA
        array('LT', 'LIT'), // LITHUANIAN
        array('', 'LOL'), // MONGO
        array('', 'LOZ'), // LOZI
        array('LB', 'LTZ'), // LUXEMBOURGISH; LETZEBURGESCH
        array('', 'LUA'), // LUBA-LULUA
        array('LU', 'LUB'), // LUBA-KATANGA
        array('LG', 'LUG'), // GANDA
        array('', 'LUI'), // LUISENO
        array('', 'LUN'), // LUNDA
        array('', 'LUO'), // LUO (KENYA AND TANZANIA)
        array('', 'LUS'), // LUSHAI
        array('MK', 'MAC'), // MACEDONIAN
        array('', 'MAD'), // MADURESE
        array('', 'MAG'), // MAGAHI
        array('MH', 'MAH'), // MARSHALLESE
        array('', 'MAI'), // MAITHILI
        array('', 'MAK'), // MAKASAR
        array('ML', 'MAL'), // MALAYALAM
        array('', 'MAN'), // MANDINGO
        array('MI', 'MAO'), // MAORI
        array('', 'MAP'), // AUSTRONESIAN LANGUAGES
        array('MR', 'MAR'), // MARATHI
        array('', 'MAS'), // MASAI
        array('MS', 'MAY'), // MALAY
        array('', 'MDF'), // MOKSHA
        array('', 'MDR'), // MANDAR
        array('', 'MEN'), // MENDE
        array('', 'MGA'), // IRISH, MIDDLE (900-1200)
        array('', 'MIC'), // MI'KMAQ; MICMAC
        array('', 'MIN'), // MINANGKABAU
        array('', 'MIS'), // UNCODED LANGUAGES
        array('', 'MKH'), // MON-KHMER LANGUAGES
        array('MG', 'MLG'), // MALAGASY
        array('MT', 'MLT'), // MALTESE
        array('', 'MNC'), // MANCHU
        array('', 'MNI'), // MANIPURI
        array('', 'MNO'), // MANOBO LANGUAGES
        array('', 'MOH'), // MOHAWK
        array('MN', 'MON'), // MONGOLIAN
        array('', 'MOS'), // MOSSI
        array('', 'MUL'), // MULTIPLE LANGUAGES
        array('', 'MUN'), // MUNDA LANGUAGES
        array('', 'MUS'), // CREEK
        array('', 'MWL'), // MIRANDESE
        array('', 'MWR'), // MARWARI
        array('', 'MYN'), // MAYAN LANGUAGES
        array('', 'MYV'), // ERZYA
        array('', 'NAH'), // NAHUATL LANGUAGES
        array('', 'NAI'), // NORTH AMERICAN INDIAN LANGUAGES
        array('', 'NAP'), // NEAPOLITAN
        array('NA', 'NAU'), // NAURU
        array('NV', 'NAV'), // NAVAJO; NAVAHO
        array('NR', 'NBL'), // NDEBELE, SOUTH; SOUTH NDEBELE
        array('ND', 'NDE'), // NDEBELE, NORTH; NORTH NDEBELE
        array('NG', 'NDO'), // NDONGA
        array('', 'NDS'), // LOW GERMAN; LOW SAXON; GERMAN, LOW; SAXON, LOW
        array('NE', 'NEP'), // NEPALI
        array('', 'NEW'), // NEPAL BHASA; NEWARI
        array('', 'NIA'), // NIAS
        array('', 'NIC'), // NIGER-KORDOFANIAN LANGUAGES
        array('', 'NIU'), // NIUEAN
        array('NN', 'NNO'), // NORWEGIAN NYNORSK; NYNORSK, NORWEGIAN
        array('NB', 'NOB'), // BOKMÅL, NORWEGIAN; NORWEGIAN BOKMÅL
        array('', 'NOG'), // NOGAI
        array('', 'NON'), // NORSE, OLD
        array('NO', 'NOR'), // NORWEGIAN
        array('', 'NQO'), // N'KO
        array('', 'NSO'), // PEDI; SEPEDI; NORTHERN SOTHO
        array('', 'NUB'), // NUBIAN LANGUAGES
        array('', 'NWC'), // CLASSICAL NEWARI; OLD NEWARI; CLASSICAL NEPAL BHASA
        array('NY', 'NYA'), // CHICHEWA; CHEWA; NYANJA
        array('', 'NYM'), // NYAMWEZI
        array('', 'NYN'), // NYANKOLE
        array('', 'NYO'), // NYORO
        array('', 'NZI'), // NZIMA
        array('OC', 'OCI'), // OCCITAN (POST 1500); PROVENÇAL
        array('OJ', 'OJI'), // OJIBWA
        array('OR', 'ORI'), // ORIYA
        array('OM', 'ORM'), // OROMO
        array('', 'OSA'), // OSAGE
        array('OS', 'OSS'), // OSSETIAN; OSSETIC
        array('', 'OTA'), // TURKISH, OTTOMAN (1500-1928)
        array('', 'OTO'), // OTOMIAN LANGUAGES
        array('', 'PAA'), // PAPUAN LANGUAGES
        array('', 'PAG'), // PANGASINAN
        array('', 'PAL'), // PAHLAVI
        array('', 'PAM'), // PAMPANGA; KAPAMPANGAN
        array('PA', 'PAN'), // PANJABI; PUNJABI
        array('', 'PAP'), // PAPIAMENTO
        array('', 'PAU'), // PALAUAN
        array('', 'PEO'), // PERSIAN, OLD (CA.600-400 B.C.)
        array('FA', 'PER'), // PERSIAN
        array('', 'PHI'), // PHILIPPINE LANGUAGES
        array('', 'PHN'), // PHOENICIAN
        array('PI', 'PLI'), // PALI
        array('PL', 'POL'), // POLISH
        array('', 'PON'), // POHNPEIAN
        array('PT', 'POR'), // PORTUGUESE
        array('', 'PRA'), // PRAKRIT LANGUAGES
        array('', 'PRO'), // PROVENÇAL, OLD (TO 1500)
        array('PS', 'PUS'), // PUSHTO; PASHTO
        array('', 'QAA-QTZ'), // RESERVED FOR LOCAL USE
        array('QU', 'QUE'), // QUECHUA
        array('', 'RAJ'), // RAJASTHANI
        array('', 'RAP'), // RAPANUI
        array('', 'RAR'), // RAROTONGAN; COOK ISLANDS MAORI
        array('', 'ROA'), // ROMANCE LANGUAGES
        array('RM', 'ROH'), // ROMANSH
        array('', 'ROM'), // ROMANY
        array('RO', 'RUM'), // ROMANIAN; MOLDAVIAN; MOLDOVAN
        array('RN', 'RUN'), // RUNDI
        array('', 'RUP'), // AROMANIAN; ARUMANIAN; MACEDO-ROMANIAN
        array('RU', 'RUS'), // RUSSIAN
        array('', 'SAD'), // SANDAWE
        array('SG', 'SAG'), // SANGO
        array('', 'SAH'), // YAKUT
        array('', 'SAI'), // SOUTH AMERICAN INDIAN (OTHER)
        array('', 'SAL'), // SALISHAN LANGUAGES
        array('', 'SAM'), // SAMARITAN ARAMAIC
        array('SA', 'SAN'), // SANSKRIT
        array('', 'SAS'), // SASAK
        array('', 'SAT'), // SANTALI
        array('', 'SCN'), // SICILIAN
        array('', 'SCO'), // SCOTS
        array('', 'SEL'), // SELKUP
        array('', 'SEM'), // SEMITIC LANGUAGES
        array('', 'SGA'), // IRISH, OLD (TO 900)
        array('', 'SGN'), // SIGN LANGUAGES
        array('', 'SHN'), // SHAN
        array('', 'SID'), // SIDAMO
        array('SI', 'SIN'), // SINHALA; SINHALESE
        array('', 'SIO'), // SIOUAN LANGUAGES
        array('', 'SIT'), // SINO-TIBETAN LANGUAGES
        array('', 'SLA'), // SLAVIC LANGUAGES
        array('SK', 'SLO'), // SLOVAK
        array('SL', 'SLV'), // SLOVENIAN
        array('', 'SMA'), // SOUTHERN SAMI
        array('SE', 'SME'), // NORTHERN SAMI
        array('', 'SMI'), // SAMI LANGUAGES
        array('', 'SMJ'), // LULE SAMI
        array('', 'SMN'), // INARI SAMI
        array('SM', 'SMO'), // SAMOAN
        array('', 'SMS'), // SKOLT SAMI
        array('SN', 'SNA'), // SHONA
        array('SD', 'SND'), // SINDHI
        array('', 'SNK'), // SONINKE
        array('', 'SOG'), // SOGDIAN
        array('SO', 'SOM'), // SOMALI
        array('', 'SON'), // SONGHAI LANGUAGES
        array('ST', 'SOT'), // SOTHO, SOUTHERN
        array('ES', 'SPA'), // SPANISH; CASTILIAN
        array('SC', 'SRD'), // SARDINIAN
        array('', 'SRN'), // SRANAN TONGO
        array('SR', 'SRP'), // SERBIAN
        array('', 'SRR'), // SERER
        array('', 'SSA'), // NILO-SAHARAN LANGUAGES
        array('SS', 'SSW'), // SWATI
        array('', 'SUK'), // SUKUMA
        array('SU', 'SUN'), // SUNDANESE
        array('', 'SUS'), // SUSU
        array('', 'SUX'), // SUMERIAN
        array('SW', 'SWA'), // SWAHILI
        array('SV', 'SWE'), // SWEDISH
        array('', 'SYC'), // CLASSICAL SYRIAC
        array('', 'SYR'), // SYRIAC
        array('TY', 'TAH'), // TAHITIAN
        array('', 'TAI'), // TAI LANGUAGES
        array('TA', 'TAM'), // TAMIL
        array('TT', 'TAT'), // TATAR
        array('TE', 'TEL'), // TELUGU
        array('', 'TEM'), // TIMNE
        array('', 'TER'), // TERENO
        array('', 'TET'), // TETUM
        array('TG', 'TGK'), // TAJIK
        array('TL', 'TGL'), // TAGALOG
        array('TH', 'THA'), // THAI
        array('BO', 'TIB'), // TIBETAN
        array('', 'TIG'), // TIGRE
        array('TI', 'TIR'), // TIGRINYA
        array('', 'TIV'), // TIV
        array('', 'TKL'), // TOKELAU
        array('', 'TLH'), // KLINGON; TLHINGAN-HOL
        array('', 'TLI'), // TLINGIT
        array('', 'TMH'), // TAMASHEK
        array('', 'TOG'), // TONGA (NYASA)
        array('TO', 'TON'), // TONGA (TONGA ISLANDS)
        array('', 'TPI'), // TOK PISIN
        array('', 'TSI'), // TSIMSHIAN
        array('TN', 'TSN'), // TSWANA
        array('TS', 'TSO'), // TSONGA
        array('TK', 'TUK'), // TURKMEN
        array('', 'TUM'), // TUMBUKA
        array('', 'TUP'), // TUPI LANGUAGES
        array('TR', 'TUR'), // TURKISH
        array('', 'TUT'), // ALTAIC LANGUAGES
        array('', 'TVL'), // TUVALU
        array('TW', 'TWI'), // TWI
        array('', 'TYV'), // TUVINIAN
        array('', 'UDM'), // UDMURT
        array('', 'UGA'), // UGARITIC
        array('UG', 'UIG'), // UIGHUR; UYGHUR
        array('UK', 'UKR'), // UKRAINIAN
        array('', 'UMB'), // UMBUNDU
        array('', 'UND'), // UNDETERMINED
        array('UR', 'URD'), // URDU
        array('UZ', 'UZB'), // UZBEK
        array('', 'VAI'), // VAI
        array('VE', 'VEN'), // VENDA
        array('VI', 'VIE'), // VIETNAMESE
        array('VO', 'VOL'), // VOLAPÜK
        array('', 'VOT'), // VOTIC
        array('', 'WAK'), // WAKASHAN LANGUAGES
        array('', 'WAL'), // WALAMO
        array('', 'WAR'), // WARAY
        array('', 'WAS'), // WASHO
        array('CY', 'WEL'), // WELSH
        array('', 'WEN'), // SORBIAN LANGUAGES
        array('WA', 'WLN'), // WALLOON
        array('WO', 'WOL'), // WOLOF
        array('', 'XAL'), // KALMYK; OIRAT
        array('XH', 'XHO'), // XHOSA
        array('', 'YAO'), // YAO
        array('', 'YAP'), // YAPESE
        array('YI', 'YID'), // YIDDISH
        array('YO', 'YOR'), // YORUBA
        array('', 'YPK'), // YUPIK LANGUAGES
        array('', 'ZAP'), // ZAPOTEC
        array('', 'ZBL'), // BLISSYMBOLS; BLISSYMBOLICS; BLISS
        array('', 'ZEN'), // ZENAGA
        array('', 'ZGH'), // STANDARD MOROCCAN TAMAZIGHT
        array('ZA', 'ZHA'), // ZHUANG; CHUANG
        array('', 'ZND'), // ZANDE LANGUAGES
        array('ZU', 'ZUL'), // ZULU
        array('', 'ZUN'), // ZUNI
        array('', 'ZXX'), // NO LINGUISTIC CONTENT; NOT APPLICABLE
        array('', 'ZZA'), // ZAZA; DIMILI; DIMLI; KIRDKI; KIRMANJKI; ZAZAKI
    );

    public $set;
    public $index;

    public function __construct($set = self::ALPHA2)
    {
        $index = array_search($set, self::getAvailableSets(), true);

        if (false === $index) {
            throw new ComponentException(sprintf('"%s" is not a valid language set for ISO 639', $set));
        }

        $this->set = $set;
        $this->index = $index;
    }

    public static function getAvailableSets()
    {
        return array(
            self::ALPHA2,
            self::ALPHA3,
        );
    }

    private function getLanguageCodeList($index)
    {
        $languageList = array();

        foreach ($this->languageCodeList as $language) {
            $languageList[] = $language[$index];
        }

        return $languageList;
    }

    public function validate($input)
    {
        if (!is_string($input) || '' === $input) {
            return false;
        }

        return in_array(
            strtoupper($input),
            $this->getLanguageCodeList($this->index),
            true
        );
    }
}
