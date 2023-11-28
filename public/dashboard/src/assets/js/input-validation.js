//administrasi
document.addEventListener('DOMContentLoaded', function() {
    var input_1 = document.getElementById('input_1error');

    var kodeprov = input_1.getAttribute('kodeprov');
    var namaprov = input_1.getAttribute('namaprov');
    var scroll1 = document.getElementById('head-1');
    if (kodeprov || namaprov) {
        var input_1 = new bootstrap.Modal(document.getElementById('input_1'));
        input_1.show();
        scroll1.scrollIntoView({ behavior: 'smooth' });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    var input_2 = document.getElementById('input_2error');
    var kodekabkot = input_2.getAttribute('kodekabkot');
    var namakabkot = input_2.getAttribute('namakabkot');
    var kodeprovkabkot = input_2.getAttribute('kodeprov-kabkot');
    var scroll2 = document.getElementById('head-2');
    if (kodekabkot || namakabkot || kodeprovkabkot) {
        var input_2 = new bootstrap.Modal(document.getElementById('input_2'));
        input_2.show();
        scroll2.scrollIntoView({ behavior: 'smooth' });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    var input_3 = document.getElementById('input_3error');
    var kodekec = input_3.getAttribute('kodekec');
    var namakec = input_3.getAttribute('namakec');
    var kodekabkotkec = input_3.getAttribute('kodekabkot-kec');
    var kodeprovkec = input_3.getAttribute('kodeprov-kec');
    var scroll3 = document.getElementById('head-3');
    if (kodekec || namakec || kodekabkotkec || kodeprovkec) {
        var input_3 = new bootstrap.Modal(document.getElementById('input_3'));
        input_3.show();
        scroll3.scrollIntoView({ behavior: 'smooth' });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    var input_4 = document.getElementById('input_4error');
    var kodedesa = input_4.getAttribute('kodedesa');
    var namadesa = input_4.getAttribute('namadesa');
    var kodekecdesa = input_4.getAttribute('kodekec-desa');
    var kodekabkotdesa = input_4.getAttribute('kodekabkot-desa');
    var kodeprovdesa = input_4.getAttribute('kodeprov-desa');
    var scroll4 = document.getElementById('head-4');
    if (kodedesa || namadesa || kodekecdesa || kodekabkotdesa || kodeprovdesa ) {
        var input_4 = new bootstrap.Modal(document.getElementById('input_4'));
        input_4.show();
        scroll4.scrollIntoView({ behavior: 'smooth' });
    }
});
//lembaga
document.addEventListener('DOMContentLoaded', function() {
    var input_1 = document.getElementById('input_1error');

    var kodedesa = input_1.getAttribute('kodedesa');
    var kodelemdes = input_1.getAttribute('kodelemdes');
    var namalemdes = input_1.getAttribute('namalemdes');
    var jenislemdes = input_1.getAttribute('jenislemdes');
    var jumlahlemdes = input_1.getAttribute('jumlahlemdes');
    var pjlemdes = input_1.getAttribute('pjlemdes');
    var tlpnlemdes = input_1.getAttribute('tlpnlemdes');
    var scroll1 = document.getElementById('head-1');
    if (kodedesa ||
        kodelemdes ||
        namalemdes ||
        jenislemdes ||
        jumlahlemdes ||
        pjlemdes ||
        tlpnlemdes
        ) {
        var input_1 = new bootstrap.Modal(document.getElementById('input_1'));
        input_1.show();
        scroll1.scrollIntoView({ behavior: 'smooth' });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    var input_2 = document.getElementById('input_2error');
    
    var kodepelaksana = input_2.getAttribute('kodepelaksana');
    var jenispelaksana = input_2.getAttribute('jenispelaksana');
    var namapelaksana = input_2.getAttribute('namapelaksana');
    var pjpelaksana = input_2.getAttribute('pjpelaksana');
    var tlpnpelaksana = input_2.getAttribute('tlpnpelaksana');
    var alamatpelaksana = input_2.getAttribute('alamatpelaksana');
    var kodeprov = input_2.getAttribute('kodeprov');
    var scroll2 = document.getElementById('head-2');
    if (
        kodepelaksana ||
        jenispelaksana ||
        namapelaksana ||
        pjpelaksana ||
        tlpnpelaksana ||
        alamatpelaksana ||
        kodeprov
        ) {
        var input_2 = new bootstrap.Modal(document.getElementById('input_2'));
        input_2.show();
        scroll2.scrollIntoView({ behavior: 'smooth' });
    }
});
//kawasan
document.addEventListener('DOMContentLoaded', function() {
    var input_1 = document.getElementById('input_1error');
    var kodekhg = input_1.getAttribute('kodekhg');
    var namakhg = input_1.getAttribute('namakhg');
    var kodeprov = input_1.getAttribute('kodeprov');
    var lindungkhg = input_1.getAttribute('lindungkhg');
    var budidayakhg = input_1.getAttribute('budidayakhg');
    var luaskhg = input_1.getAttribute('luaskhg');
    var satuankhg = input_1.getAttribute('satuankhg');
    var scroll1 = document.getElementById('head-1');
    if (kodekhg 
        || namakhg
        || kodeprov
        || lindungkhg
        || budidayakhg
        || luaskhg
        || satuankhg
        ) {
        var input_1 = new bootstrap.Modal(document.getElementById('input_1'));
        input_1.show();
        scroll1.scrollIntoView({ behavior: 'smooth' });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    var input_2 = document.getElementById('input_2error');
    var kodekhgsubkhg = input_2.getAttribute('kodekhg-subkhg');
    var kodesubkhg = input_2.getAttribute('kodesubkhg');
    var namasubkhg = input_2.getAttribute('namasubkhg');
    var luassubkhg = input_2.getAttribute('luassubkhg');
    var satuansubkhg = input_2.getAttribute('satuansubkhg');
    var scroll2 = document.getElementById('head-2');
    if (kodekhgsubkhg 
        || kodesubkhg 
        || namasubkhg
        || luassubkhg
        || satuansubkhg
        ) {
        var input_2 = new bootstrap.Modal(document.getElementById('input_2'));
        input_2.show();
        scroll2.scrollIntoView({ behavior: 'smooth' });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    var input_3 = document.getElementById('input_3error');
    var kodesubkhghru = input_3.getAttribute('kodesubkhg-hru');
    var kodehru = input_3.getAttribute('kodehru');
    var namahru = input_3.getAttribute('namahru');
    var luashru = input_3.getAttribute('luashru');
    var satuanhru = input_3.getAttribute('satuanhru');
    var scroll3 = document.getElementById('head-3');
    if (kodehru 
        || kodesubkhghru 
        || namahru 
        || luashru
        || satuanhru
        ) {
        var input_3 = new bootstrap.Modal(document.getElementById('input_3'));
        input_3.show();
        scroll3.scrollIntoView({ behavior: 'smooth' });
    }
});
//auth
document.addEventListener('DOMContentLoaded', function() {
    var input_1 = document.getElementById('input_1error');
    var email = input_1.getAttribute('email');
    var username = input_1.getAttribute('username');
    var nama = input_1.getAttribute('nama');
    if (username 
        || email 
        || nama 
        ) {
        var input_1 = new bootstrap.Modal(document.getElementById('input_1'));
        input_1.show();
        scroll3.scrollIntoView({ behavior: 'smooth' });
    }
});
//dokumen
document.addEventListener('DOMContentLoaded', function() {
    var input_1 = document.getElementById('input_1error');

    var kodedoc = input_1.getAttribute('kodedoc');
    var tipedoc = input_1.getAttribute('tipedoc');
    var judul = input_1.getAttribute('judul');
    var berlaku = input_1.getAttribute('berlaku');
    var berakhir = input_1.getAttribute('berakhir');
    var pengesah = input_1.getAttribute('pengesah');
    var scroll1 = document.getElementById('head-1');
    if (kodedoc 
        || tipedoc
        || judul
        || berlaku
        || berakhir
        || pengesah
        ) {
        var input_1 = new bootstrap.Modal(document.getElementById('input_1'));
        input_1.show();
        scroll1.scrollIntoView({ behavior: 'smooth' });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    var input_2 = document.getElementById('input_2error');
    var koderencanatarger = input_2.getAttribute('koderencana-target');
    var kodetarget = input_2.getAttribute('kodetarget');
    var volume = input_2.getAttribute('volume');
    var satuan = input_2.getAttribute('satuan');
    var scroll2 = document.getElementById('head-2');
    if (koderencanatarger 
        || kodetarget 
        || volume
        || satuan
        ) {
        var input_2 = new bootstrap.Modal(document.getElementById('input_2'));
        input_2.show();
        scroll2.scrollIntoView({ behavior: 'smooth' });
    }
});

//tindakan
document.addEventListener('DOMContentLoaded', function() {
    var input_1 = document.getElementById('input_1error');
    var koderencana = input_1.getAttribute('koderencana');
    var kodetindakan = input_1.getAttribute('kodetindakan');
    var kodeprov = input_1.getAttribute('kodeprov');
    var mulai = input_1.getAttribute('mulai');
    var selesai = input_1.getAttribute('selesai');
    var pj = input_1.getAttribute('pj');
    var scroll1 = document.getElementById('head-1');
    if (koderencana 
        || kodetindakan
        || kodeprov
        || mulai
        || selesai
        || pj
        ) {
        var input_1 = new bootstrap.Modal(document.getElementById('input_1'));
        input_1.show();
        scroll1.scrollIntoView({ behavior: 'smooth' });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    var input_2 = document.getElementById('input_2error');
    var kodetindakansub = input_2.getAttribute('kodetindakan-sub');
    var kodesubtindakan = input_2.getAttribute('kodesubtindakan');
    var namasubtindakan = input_2.getAttribute('namasubtindakan');
    var volume = input_2.getAttribute('volume');
    var satuan = input_2.getAttribute('satuan');
    var pjsubtindakan = input_2.getAttribute('pjsubtindakan');
    var dessubtindakan = input_2.getAttribute('dessubtindakan');
    var scroll2 = document.getElementById('head-2');
    if (kodetindakansub 
        || kodesubtindakan 
        || namasubtindakan
        || volume
        || satuan
        || pjsubtindakan
        || dessubtindakan
        ) {
        var input_2 = new bootstrap.Modal(document.getElementById('input_2'));
        input_2.show();
        scroll2.scrollIntoView({ behavior: 'smooth' });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    var input_3 = document.getElementById('input_3error');
    var kodetindakankeg = input_3.getAttribute('kodetindakan-keg');
    var kodekegiatan = input_3.getAttribute('kodekegiatan');
    var namakegiatan = input_3.getAttribute('namakegiatan');
    var deskegiatan = input_3.getAttribute('deskegiatan');
    var scroll3 = document.getElementById('head-3');
    if (kodekegiatan 
        || kodetindakankeg 
        || namakegiatan 
        || deskegiatan
        ) {
        var input_3 = new bootstrap.Modal(document.getElementById('input_3'));
        input_3.show();
        scroll3.scrollIntoView({ behavior: 'smooth' });
    }
});
//rencana
document.addEventListener('DOMContentLoaded', function() {
    var input_1 = document.getElementById('input_1error');
    var kodealokasi = input_1.getAttribute('kodealokasi');
    var jenis = input_1.getAttribute('jenis');
    var subtindakan = input_1.getAttribute('subtindakan');
    var pelaksana = input_1.getAttribute('pelaksana');
    var desa = input_1.getAttribute('desa');
    var hru = input_1.getAttribute('hru');
    var volume = input_1.getAttribute('volume');
    var satuan = input_1.getAttribute('satuan');
    var pj = input_1.getAttribute('pj');
    var scroll1 = document.getElementById('head-1');
    if (kodealokasi 
        || jenis
        || subtindakan
        || pelaksana
        || desa
        || hru
        || volume
        || satuan
        || pj
        ) {
        var input_1 = new bootstrap.Modal(document.getElementById('input_1'));
        input_1.show();
        scroll1.scrollIntoView({ behavior: 'smooth' });
    }
});