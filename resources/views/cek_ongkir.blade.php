<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cek Ongkir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ url('/editable-select/jquery-editable-select.css') }}" rel="stylesheet">
    <style>
        body {
            background: #f3f3f3;
        }

        .container {
            width: 75%;
        }

        .input-box {
            width: 40%;
            background: #ffffff;
            height: fit-content;
        }

        .result-item > .row2 {
            gap: 8%;
        }

        .result-box{
            width: 60%;
            background: #ffffff;
        }

        .result-box-content > .result-item {
            width: 100%;
            background: #ececec;
            border: solid 1px rgb(179, 179, 179);
            display: block;
            padding: 13px 20px;
        }

        .courier {
            width: 30%
        }

        .service {
            width: 30%
        }

        .courier > .short-name {
            font-weight: bold;
            font-size: 20px;
        }

        .long-name {
            font-size: 12px;
        }

        .price {
            font-weight: 700;
            font-size: 20px;
            color: rgb(0, 64, 182);
        }

        .input-box > .title {
            font-size: 20px;
            font-weight: 600;
            text-align: center
        }

        .estimasi {
            font-weight: 700;
            font-size: 15px;
            background: #f7f700;
            width: fit-content;
        }


    </style>
</head>
<body>
    <div class="container d-flex py-5 px-0 gap-4">
        <div class="input-box border p-5">
            <div class="title mb-4">Hitung Ongkir dari Yogyakarta</div>
            <form>
                <div class="form-group mb-2">
                    <label for="origin_city">Asal: </label>
                    <select name="origin" id="origin_city" class="form-control" required disabled>
                        <option value="501" selected>Yogyakarta</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="dest_city">Tujuan: </label>
                    <select name="destination" id="dest_city" class="form-control" required></select>                
                </div>
                <div class="form-group mb-4">
                    <label>Berat: </label>
                    <input name="weight" class="form-control" type="number" placeholder="Masukkan berat (gr)" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 btn-cek">Cek</button>
            </form>
        </div>
        <div class="result-box border p-3">
            <div class="title mb-2">Hasil Pencarian:</div>
            <div class="result-box-content"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ url('/editable-select/jquery-editable-select.js') }}"></script>  
    <script>
        var dataCities = [{"value": "Aceh Barat", "data": "1"}, {"value": "Aceh Barat Daya", "data": "2"}, {"value": "Aceh Besar", "data": "3"}, {"value": "Aceh Jaya", "data": "4"}, {"value": "Aceh Selatan", "data": "5"}, {"value": "Aceh Singkil", "data": "6"}, {"value": "Aceh Tamiang", "data": "7"}, {"value": "Aceh Tengah", "data": "8"}, {"value": "Aceh Tenggara", "data": "9"}, {"value": "Aceh Timur", "data": "10"}, {"value": "Aceh Utara", "data": "11"}, {"value": "Agam", "data": "12"}, {"value": "Alor", "data": "13"}, {"value": "Ambon", "data": "14"}, {"value": "Asahan", "data": "15"}, {"value": "Asmat", "data": "16"}, {"value": "Badung", "data": "17"}, {"value": "Balangan", "data": "18"}, {"value": "Balikpapan", "data": "19"}, {"value": "Banda Aceh", "data": "20"}, {"value": "Bandar Lampung", "data": "21"}, {"value": "Bandung", "data": "22"}, {"value": "Bandung (Kota)", "data": "23"}, {"value": "Bandung Barat", "data": "24"}, {"value": "Banggai", "data": "25"}, {"value": "Banggai Kepulauan", "data": "26"}, {"value": "Bangka", "data": "27"}, {"value": "Bangka Barat", "data": "28"}, {"value": "Bangka Selatan", "data": "29"}, {"value": "Bangka Tengah", "data": "30"}, {"value": "Bangkalan", "data": "31"}, {"value": "Bangli", "data": "32"}, {"value": "Banjar (Kalimantan Selatan)", "data": "33"}, {"value": "Banjar (Jawa Barat)", "data": "34"}, {"value": "Banjarbaru", "data": "35"}, {"value": "Banjarmasin", "data": "36"}, {"value": "Banjarnegara", "data": "37"}, {"value": "Bantaeng", "data": "38"}, {"value": "Bantul", "data": "39"}, {"value": "Banyuasin", "data": "40"}, {"value": "Banyumas", "data": "41"}, {"value": "Banyuwangi", "data": "42"}, {"value": "Barito Kuala", "data": "43"}, {"value": "Barito Selatan", "data": "44"}, {"value": "Barito Timur", "data": "45"}, {"value": "Barito Utara", "data": "46"}, {"value": "Barru", "data": "47"}, {"value": "Batam", "data": "48"}, {"value": "Batang", "data": "49"}, {"value": "Batang Hari", "data": "50"}, {"value": "Batu", "data": "51"}, {"value": "Batu Bara", "data": "52"}, {"value": "Bau-Bau", "data": "53"}, {"value": "Bekasi", "data": "54"}, {"value": "Bekasi (Kota)", "data": "55"}, {"value": "Belitung", "data": "56"}, {"value": "Belitung Timur", "data": "57"}, {"value": "Belu", "data": "58"}, {"value": "Bener Meriah", "data": "59"}, {"value": "Bengkalis", "data": "60"}, {"value": "Bengkayang", "data": "61"}, {"value": "Bengkulu", "data": "62"}, {"value": "Bengkulu Selatan", "data": "63"}, {"value": "Bengkulu Tengah", "data": "64"}, {"value": "Bengkulu Utara", "data": "65"}, {"value": "Berau", "data": "66"}, {"value": "Biak Numfor", "data": "67"}, {"value": "Bima", "data": "68"}, {"value": "Bima (Kota)", "data": "69"}, {"value": "Binjai", "data": "70"}, {"value": "Bintan", "data": "71"}, {"value": "Bireuen", "data": "72"}, {"value": "Bitung", "data": "73"}, {"value": "Blitar", "data": "74"}, {"value": "Blitar (Kota)", "data": "75"}, {"value": "Blora", "data": "76"}, {"value": "Boalemo", "data": "77"}, {"value": "Bogor", "data": "78"}, {"value": "Bogor (Kota)", "data": "79"}, {"value": "Bojonegoro", "data": "80"}, {"value": "Bolaang Mongondow (Bolmong)", "data": "81"}, {"value": "Bolaang Mongondow Selatan", "data": "82"}, {"value": "Bolaang Mongondow Timur", "data": "83"}, {"value": "Bolaang Mongondow Utara", "data": "84"}, {"value": "Bombana", "data": "85"}, {"value": "Bondowoso", "data": "86"}, {"value": "Bone", "data": "87"}, {"value": "Bone Bolango", "data": "88"}, {"value": "Bontang", "data": "89"}, {"value": "Boven Digoel", "data": "90"}, {"value": "Boyolali", "data": "91"}, {"value": "Brebes", "data": "92"}, {"value": "Bukittinggi", "data": "93"}, {"value": "Buleleng", "data": "94"}, {"value": "Bulukumba", "data": "95"}, {"value": "Bulungan (Bulongan)", "data": "96"}, {"value": "Bungo", "data": "97"}, {"value": "Buol", "data": "98"}, {"value": "Buru", "data": "99"}, {"value": "Buru Selatan", "data": "100"}, {"value": "Buton", "data": "101"}, {"value": "Buton Utara", "data": "102"}, {"value": "Ciamis", "data": "103"}, {"value": "Cianjur", "data": "104"}, {"value": "Cilacap", "data": "105"}, {"value": "Cilegon", "data": "106"}, {"value": "Cimahi", "data": "107"}, {"value": "Cirebon", "data": "108"}, {"value": "Cirebon (Kota)", "data": "109"}, {"value": "Dairi", "data": "110"}, {"value": "Deiyai (Deliyai)", "data": "111"}, {"value": "Deli Serdang", "data": "112"}, {"value": "Demak", "data": "113"}, {"value": "Denpasar", "data": "114"}, {"value": "Depok", "data": "115"}, {"value": "Dharmasraya", "data": "116"}, {"value": "Dogiyai", "data": "117"}, {"value": "Dompu", "data": "118"}, {"value": "Donggala", "data": "119"}, {"value": "Dumai", "data": "120"}, {"value": "Empat Lawang", "data": "121"}, {"value": "Ende", "data": "122"}, {"value": "Enrekang", "data": "123"}, {"value": "Fakfak", "data": "124"}, {"value": "Flores Timur", "data": "125"}, {"value": "Garut", "data": "126"}, {"value": "Gayo Lues", "data": "127"}, {"value": "Gianyar", "data": "128"}, {"value": "Gorontalo", "data": "129"}, {"value": "Gorontalo (Kota)", "data": "130"}, {"value": "Gorontalo Utara", "data": "131"}, {"value": "Gowa", "data": "132"}, {"value": "Gresik", "data": "133"}, {"value": "Grobogan", "data": "134"}, {"value": "Gunung Kidul", "data": "135"}, {"value": "Gunung Mas", "data": "136"}, {"value": "Gunungsitoli", "data": "137"}, {"value": "Halmahera Barat", "data": "138"}, {"value": "Halmahera Selatan", "data": "139"}, {"value": "Halmahera Tengah", "data": "140"}, {"value": "Halmahera Timur", "data": "141"}, {"value": "Halmahera Utara", "data": "142"}, {"value": "Hulu Sungai Selatan", "data": "143"}, {"value": "Hulu Sungai Tengah", "data": "144"}, {"value": "Hulu Sungai Utara", "data": "145"}, {"value": "Humbang Hasundutan", "data": "146"}, {"value": "Indragiri Hilir", "data": "147"}, {"value": "Indragiri Hulu", "data": "148"}, {"value": "Indramayu", "data": "149"}, {"value": "Intan Jaya", "data": "150"}, {"value": "Jakarta Barat", "data": "151"}, {"value": "Jakarta Pusat", "data": "152"}, {"value": "Jakarta Selatan", "data": "153"}, {"value": "Jakarta Timur", "data": "154"}, {"value": "Jakarta Utara", "data": "155"}, {"value": "Jambi", "data": "156"}, {"value": "Jayapura", "data": "157"}, {"value": "Jayapura (Kota)", "data": "158"}, {"value": "Jayawijaya", "data": "159"}, {"value": "Jember", "data": "160"}, {"value": "Jembrana", "data": "161"}, {"value": "Jeneponto", "data": "162"}, {"value": "Jepara", "data": "163"}, {"value": "Jombang", "data": "164"}, {"value": "Kaimana", "data": "165"}, {"value": "Kampar", "data": "166"}, {"value": "Kapuas", "data": "167"}, {"value": "Kapuas Hulu", "data": "168"}, {"value": "Karanganyar", "data": "169"}, {"value": "Karangasem", "data": "170"}, {"value": "Karawang", "data": "171"}, {"value": "Karimun", "data": "172"}, {"value": "Karo", "data": "173"}, {"value": "Katingan", "data": "174"}, {"value": "Kaur", "data": "175"}, {"value": "Kayong Utara", "data": "176"}, {"value": "Kebumen", "data": "177"}, {"value": "Kediri", "data": "178"}, {"value": "Kediri (Kota)", "data": "179"}, {"value": "Keerom", "data": "180"}, {"value": "Kendal", "data": "181"}, {"value": "Kendari", "data": "182"}, {"value": "Kepahiang", "data": "183"}, {"value": "Kepulauan Anambas", "data": "184"}, {"value": "Kepulauan Aru", "data": "185"}, {"value": "Kepulauan Mentawai", "data": "186"}, {"value": "Kepulauan Meranti", "data": "187"}, {"value": "Kepulauan Sangihe", "data": "188"}, {"value": "Kepulauan Seribu", "data": "189"}, {"value": "Kepulauan Siau Tagulandang Biaro (Sitaro)", "data": "190"}, {"value": "Kepulauan Sula", "data": "191"}, {"value": "Kepulauan Talaud", "data": "192"}, {"value": "Kepulauan Yapen (Yapen Waropen)", "data": "193"}, {"value": "Kerinci", "data": "194"}, {"value": "Ketapang", "data": "195"}, {"value": "Klaten", "data": "196"}, {"value": "Klungkung", "data": "197"}, {"value": "Kolaka", "data": "198"}, {"value": "Kolaka Utara", "data": "199"}, {"value": "Konawe", "data": "200"}, {"value": "Konawe Selatan", "data": "201"}, {"value": "Konawe Utara", "data": "202"}, {"value": "Kotabaru", "data": "203"}, {"value": "Kotamobagu", "data": "204"}, {"value": "Kotawaringin Barat", "data": "205"}, {"value": "Kotawaringin Timur", "data": "206"}, {"value": "Kuantan Singingi", "data": "207"}, {"value": "Kubu Raya", "data": "208"}, {"value": "Kudus", "data": "209"}, {"value": "Kulon Progo", "data": "210"}, {"value": "Kuningan", "data": "211"}, {"value": "Kupang", "data": "212"}, {"value": "Kupang (Kota)", "data": "213"}, {"value": "Kutai Barat", "data": "214"}, {"value": "Kutai Kartanegara", "data": "215"}, {"value": "Kutai Timur", "data": "216"}, {"value": "Labuhan Batu", "data": "217"}, {"value": "Labuhan Batu Selatan", "data": "218"}, {"value": "Labuhan Batu Utara", "data": "219"}, {"value": "Lahat", "data": "220"}, {"value": "Lamandau", "data": "221"}, {"value": "Lamongan", "data": "222"}, {"value": "Lampung Barat", "data": "223"}, {"value": "Lampung Selatan", "data": "224"}, {"value": "Lampung Tengah", "data": "225"}, {"value": "Lampung Timur", "data": "226"}, {"value": "Lampung Utara", "data": "227"}, {"value": "Landak", "data": "228"}, {"value": "Langkat", "data": "229"}, {"value": "Langsa", "data": "230"}, {"value": "Lanny Jaya", "data": "231"}, {"value": "Lebak", "data": "232"}, {"value": "Lebong", "data": "233"}, {"value": "Lembata", "data": "234"}, {"value": "Lhokseumawe", "data": "235"}, {"value": "Lima Puluh Koto\/Kota", "data": "236"}, {"value": "Lingga", "data": "237"}, {"value": "Lombok Barat", "data": "238"}, {"value": "Lombok Tengah", "data": "239"}, {"value": "Lombok Timur", "data": "240"}, {"value": "Lombok Utara", "data": "241"}, {"value": "Lubuk Linggau", "data": "242"}, {"value": "Lumajang", "data": "243"}, {"value": "Luwu", "data": "244"}, {"value": "Luwu Timur", "data": "245"}, {"value": "Luwu Utara", "data": "246"}, {"value": "Madiun", "data": "247"}, {"value": "Madiun (Kota)", "data": "248"}, {"value": "Magelang", "data": "249"}, {"value": "Magelang (Kota)", "data": "250"}, {"value": "Magetan", "data": "251"}, {"value": "Majalengka", "data": "252"}, {"value": "Majene", "data": "253"}, {"value": "Makassar", "data": "254"}, {"value": "Malang", "data": "255"}, {"value": "Malang (Kota)", "data": "256"}, {"value": "Malinau", "data": "257"}, {"value": "Maluku Barat Daya", "data": "258"}, {"value": "Maluku Tengah", "data": "259"}, {"value": "Maluku Tenggara", "data": "260"}, {"value": "Maluku Tenggara Barat", "data": "261"}, {"value": "Mamasa", "data": "262"}, {"value": "Mamberamo Raya", "data": "263"}, {"value": "Mamberamo Tengah", "data": "264"}, {"value": "Mamuju", "data": "265"}, {"value": "Mamuju Utara", "data": "266"}, {"value": "Manado", "data": "267"}, {"value": "Mandailing Natal", "data": "268"}, {"value": "Manggarai", "data": "269"}, {"value": "Manggarai Barat", "data": "270"}, {"value": "Manggarai Timur", "data": "271"}, {"value": "Manokwari", "data": "272"}, {"value": "Manokwari Selatan", "data": "273"}, {"value": "Mappi", "data": "274"}, {"value": "Maros", "data": "275"}, {"value": "Mataram", "data": "276"}, {"value": "Maybrat", "data": "277"}, {"value": "Medan", "data": "278"}, {"value": "Melawi", "data": "279"}, {"value": "Merangin", "data": "280"}, {"value": "Merauke", "data": "281"}, {"value": "Mesuji", "data": "282"}, {"value": "Metro", "data": "283"}, {"value": "Mimika", "data": "284"}, {"value": "Minahasa", "data": "285"}, {"value": "Minahasa Selatan", "data": "286"}, {"value": "Minahasa Tenggara", "data": "287"}, {"value": "Minahasa Utara", "data": "288"}, {"value": "Mojokerto", "data": "289"}, {"value": "Mojokerto (Kota)", "data": "290"}, {"value": "Morowali", "data": "291"}, {"value": "Muara Enim", "data": "292"}, {"value": "Muaro Jambi", "data": "293"}, {"value": "Muko Muko", "data": "294"}, {"value": "Muna", "data": "295"}, {"value": "Murung Raya", "data": "296"}, {"value": "Musi Banyuasin", "data": "297"}, {"value": "Musi Rawas", "data": "298"}, {"value": "Nabire", "data": "299"}, {"value": "Nagan Raya", "data": "300"}, {"value": "Nagekeo", "data": "301"}, {"value": "Natuna", "data": "302"}, {"value": "Nduga", "data": "303"}, {"value": "Ngada", "data": "304"}, {"value": "Nganjuk", "data": "305"}, {"value": "Ngawi", "data": "306"}, {"value": "Nias", "data": "307"}, {"value": "Nias Barat", "data": "308"}, {"value": "Nias Selatan", "data": "309"}, {"value": "Nias Utara", "data": "310"}, {"value": "Nunukan", "data": "311"}, {"value": "Ogan Ilir", "data": "312"}, {"value": "Ogan Komering Ilir", "data": "313"}, {"value": "Ogan Komering Ulu", "data": "314"}, {"value": "Ogan Komering Ulu Selatan", "data": "315"}, {"value": "Ogan Komering Ulu Timur", "data": "316"}, {"value": "Pacitan", "data": "317"}, {"value": "Padang", "data": "318"}, {"value": "Padang Lawas", "data": "319"}, {"value": "Padang Lawas Utara", "data": "320"}, {"value": "Padang Panjang", "data": "321"}, {"value": "Padang Pariaman", "data": "322"}, {"value": "Padang Sidempuan", "data": "323"}, {"value": "Pagar Alam", "data": "324"}, {"value": "Pakpak Bharat", "data": "325"}, {"value": "Palangka Raya", "data": "326"}, {"value": "Palembang", "data": "327"}, {"value": "Palopo", "data": "328"}, {"value": "Palu", "data": "329"}, {"value": "Pamekasan", "data": "330"}, {"value": "Pandeglang", "data": "331"}, {"value": "Pangandaran", "data": "332"}, {"value": "Pangkajene Kepulauan", "data": "333"}, {"value": "Pangkal Pinang", "data": "334"}, {"value": "Paniai", "data": "335"}, {"value": "Parepare", "data": "336"}, {"value": "Pariaman", "data": "337"}, {"value": "Parigi Moutong", "data": "338"}, {"value": "Pasaman", "data": "339"}, {"value": "Pasaman Barat", "data": "340"}, {"value": "Paser", "data": "341"}, {"value": "Pasuruan", "data": "342"}, {"value": "Pasuruan (Kota)", "data": "343"}, {"value": "Pati", "data": "344"}, {"value": "Payakumbuh", "data": "345"}, {"value": "Pegunungan Arfak", "data": "346"}, {"value": "Pegunungan Bintang", "data": "347"}, {"value": "Pekalongan", "data": "348"}, {"value": "Pekalongan (Kota)", "data": "349"}, {"value": "Pekanbaru", "data": "350"}, {"value": "Pelalawan", "data": "351"}, {"value": "Pemalang", "data": "352"}, {"value": "Pematang Siantar", "data": "353"}, {"value": "Penajam Paser Utara", "data": "354"}, {"value": "Pesawaran", "data": "355"}, {"value": "Pesisir Barat", "data": "356"}, {"value": "Pesisir Selatan", "data": "357"}, {"value": "Pidie", "data": "358"}, {"value": "Pidie Jaya", "data": "359"}, {"value": "Pinrang", "data": "360"}, {"value": "Pohuwato", "data": "361"}, {"value": "Polewali Mandar", "data": "362"}, {"value": "Ponorogo", "data": "363"}, {"value": "Pontianak", "data": "364"}, {"value": "Pontianak (Kota)", "data": "365"}, {"value": "Poso", "data": "366"}, {"value": "Prabumulih", "data": "367"}, {"value": "Pringsewu", "data": "368"}, {"value": "Probolinggo", "data": "369"}, {"value": "Probolinggo (Kota)", "data": "370"}, {"value": "Pulang Pisau", "data": "371"}, {"value": "Pulau Morotai", "data": "372"}, {"value": "Puncak", "data": "373"}, {"value": "Puncak Jaya", "data": "374"}, {"value": "Purbalingga", "data": "375"}, {"value": "Purwakarta", "data": "376"}, {"value": "Purworejo", "data": "377"}, {"value": "Raja Ampat", "data": "378"}, {"value": "Rejang Lebong", "data": "379"}, {"value": "Rembang", "data": "380"}, {"value": "Rokan Hilir", "data": "381"}, {"value": "Rokan Hulu", "data": "382"}, {"value": "Rote Ndao", "data": "383"}, {"value": "Sabang", "data": "384"}, {"value": "Sabu Raijua", "data": "385"}, {"value": "Salatiga", "data": "386"}, {"value": "Samarinda", "data": "387"}, {"value": "Sambas", "data": "388"}, {"value": "Samosir", "data": "389"}, {"value": "Sampang", "data": "390"}, {"value": "Sanggau", "data": "391"}, {"value": "Sarmi", "data": "392"}, {"value": "Sarolangun", "data": "393"}, {"value": "Sawah Lunto", "data": "394"}, {"value": "Sekadau", "data": "395"}, {"value": "Selayar (Kepulauan Selayar)", "data": "396"}, {"value": "Seluma", "data": "397"}, {"value": "Semarang", "data": "398"}, {"value": "Semarang (Kota)", "data": "399"}, {"value": "Seram Bagian Barat", "data": "400"}, {"value": "Seram Bagian Timur", "data": "401"}, {"value": "Serang", "data": "402"}, {"value": "Serang (Kota)", "data": "403"}, {"value": "Serdang Bedagai", "data": "404"}, {"value": "Seruyan", "data": "405"}, {"value": "Siak", "data": "406"}, {"value": "Sibolga", "data": "407"}, {"value": "Sidenreng Rappang\/Rapang", "data": "408"}, {"value": "Sidoarjo", "data": "409"}, {"value": "Sigi", "data": "410"}, {"value": "Sijunjung (Sawah Lunto Sijunjung)", "data": "411"}, {"value": "Sikka", "data": "412"}, {"value": "Simalungun", "data": "413"}, {"value": "Simeulue", "data": "414"}, {"value": "Singkawang", "data": "415"}, {"value": "Sinjai", "data": "416"}, {"value": "Sintang", "data": "417"}, {"value": "Situbondo", "data": "418"}, {"value": "Sleman", "data": "419"}, {"value": "Solok", "data": "420"}, {"value": "Solok (Kota)", "data": "421"}, {"value": "Solok Selatan", "data": "422"}, {"value": "Soppeng", "data": "423"}, {"value": "Sorong", "data": "424"}, {"value": "Sorong (Kota)", "data": "425"}, {"value": "Sorong Selatan", "data": "426"}, {"value": "Sragen", "data": "427"}, {"value": "Subang", "data": "428"}, {"value": "Subulussalam", "data": "429"}, {"value": "Sukabumi", "data": "430"}, {"value": "Sukabumi (Kota)", "data": "431"}, {"value": "Sukamara", "data": "432"}, {"value": "Sukoharjo", "data": "433"}, {"value": "Sumba Barat", "data": "434"}, {"value": "Sumba Barat Daya", "data": "435"}, {"value": "Sumba Tengah", "data": "436"}, {"value": "Sumba Timur", "data": "437"}, {"value": "Sumbawa", "data": "438"}, {"value": "Sumbawa Barat", "data": "439"}, {"value": "Sumedang", "data": "440"}, {"value": "Sumenep", "data": "441"}, {"value": "Sungaipenuh", "data": "442"}, {"value": "Supiori", "data": "443"}, {"value": "Surabaya", "data": "444"}, {"value": "Surakarta (Solo)", "data": "445"}, {"value": "Tabalong", "data": "446"}, {"value": "Tabanan", "data": "447"}, {"value": "Takalar", "data": "448"}, {"value": "Tambrauw", "data": "449"}, {"value": "Tana Tidung", "data": "450"}, {"value": "Tana Toraja", "data": "451"}, {"value": "Tanah Bumbu", "data": "452"}, {"value": "Tanah Datar", "data": "453"}, {"value": "Tanah Laut", "data": "454"}, {"value": "Tangerang", "data": "455"}, {"value": "Tangerang (Kota)", "data": "456"}, {"value": "Tangerang Selatan", "data": "457"}, {"value": "Tanggamus", "data": "458"}, {"value": "Tanjung Balai", "data": "459"}, {"value": "Tanjung Jabung Barat", "data": "460"}, {"value": "Tanjung Jabung Timur", "data": "461"}, {"value": "Tanjung Pinang", "data": "462"}, {"value": "Tapanuli Selatan", "data": "463"}, {"value": "Tapanuli Tengah", "data": "464"}, {"value": "Tapanuli Utara", "data": "465"}, {"value": "Tapin", "data": "466"}, {"value": "Tarakan", "data": "467"}, {"value": "Tasikmalaya", "data": "468"}, {"value": "Tasikmalaya (Kota)", "data": "469"}, {"value": "Tebing Tinggi", "data": "470"}, {"value": "Tebo", "data": "471"}, {"value": "Tegal", "data": "472"}, {"value": "Tegal (Kota)", "data": "473"}, {"value": "Teluk Bintuni", "data": "474"}, {"value": "Teluk Wondama", "data": "475"}, {"value": "Temanggung", "data": "476"}, {"value": "Ternate", "data": "477"}, {"value": "Tidore Kepulauan", "data": "478"}, {"value": "Timor Tengah Selatan", "data": "479"}, {"value": "Timor Tengah Utara", "data": "480"}, {"value": "Toba Samosir", "data": "481"}, {"value": "Tojo Una-Una", "data": "482"}, {"value": "Toli-Toli", "data": "483"}, {"value": "Tolikara", "data": "484"}, {"value": "Tomohon", "data": "485"}, {"value": "Toraja Utara", "data": "486"}, {"value": "Trenggalek", "data": "487"}, {"value": "Tual", "data": "488"}, {"value": "Tuban", "data": "489"}, {"value": "Tulang Bawang", "data": "490"}, {"value": "Tulang Bawang Barat", "data": "491"}, {"value": "Tulungagung", "data": "492"}, {"value": "Wajo", "data": "493"}, {"value": "Wakatobi", "data": "494"}, {"value": "Waropen", "data": "495"}, {"value": "Way Kanan", "data": "496"}, {"value": "Wonogiri", "data": "497"}, {"value": "Wonosobo", "data": "498"}, {"value": "Yahukimo", "data": "499"}, {"value": "Yalimo", "data": "500"}, {"value": "Yogyakarta", "data": "501"}];

        $(document).ready(function(){
            for(let i = 0; i < dataCities.length; i++){
                let html = '<option value="'+ dataCities[i].data + '">' + dataCities[i].value + '</option>';
                $('#dest_city').append(html);
            }

            $('#origin_city').editableSelect();

            $('#dest_city').on('select.editable-select', function (element) {
                let city_id = $('#dest_city').siblings('.es-list').find('li.selected').val()
            }).editableSelect();
        });

        $('.btn-cek').click(function(e){
            e.preventDefault(); 

            let origin = $('#origin_city').siblings('.es-list').find('li[selected=selected]').val();
            let destination = $('#dest_city').siblings('.es-list').find('li.es-visible').val();
            let weight = $('form > .form-group > input[name=weight]').val();

            if($('#dest_city').val() === '' || weight === ''){
                alert('Semua field harus diisi!');
                return false;
            }

            let data = {
                origin: origin,
                destination: destination,
                weight: weight,
            }

            console.log($('#dest_city').siblings('.es-list').find('li.selected').val());

            $.ajax({
                type: "GET",
                url: "{{ route('cek_ongkir') }}",
                data: data,
                success: success,
                dataType: "json",
                beforeSend: function() {
                    $('.btn-cek').addClass('disabled').text('Mengecek..');
                },
                complete: function() {
                    $('.btn-cek').removeClass('disabled').text('Cek');
                }
                
            }).fail(function(){
                alert("Gagal mengambil data!");
            });

            function success(json){
                if(json.success == 1){
                    render_result_item(json.data);
                }else if(json.success == 0 || typeof json.success === 'undefined'){
                    alert('Gagal mengambil data');
                }
            }
        });

        function render_result_item(data){
            $('.result-box-content').empty()

            var moneyFormatter  = new Intl.NumberFormat();
            $.each(data, function(i, el){
                let courier_sn = el.code; //short name
                courier_sn = courier_sn.toUpperCase();
                let courier_ln = el.name; //long name

                $.each(el.costs, function(i, el){
                    let service_name = el.service;
                    let service_desc = el.description;

                    let html = 
                    '<div class="result-item mb-2">'+
                        '<div class="row2 d-flex align-items-center">'+
                        '<div class="courier">'+
                            '<div class="short-name">'+ courier_sn +'</div>'+
                            '<div class="long-name">' + courier_ln + '</div>'+
                        '</div>'+
                        '<div class="service">'+
                            '<div class="short-name">'+ service_name +'</div>'+
                            '<div class="long-name">' + service_desc + '</div>'+
                        '</div>' +
                        '<div class="info">' +
                            '<div class="price">Rp '+ moneyFormatter.format(el.cost[0].value) +'</div>' +
                            '<div class="estimasi px-2">'+ parseInt(el.cost[0].etd) +' hari</div>' +
                        '</div>'
                    '</div>';

                    $('.result-box-content').append(html);
                });
            });
        }
    </script>
</body>
</html>