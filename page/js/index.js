var side_bar = document.getElementById('side_bar');
var change_side = false;
function side_bar_f() {
    if (change_side == true) {
        hien_side();
        change_side = false;
    }
    else {
        dong_side();
        change_side = true;
    }
}
function hien_side() {
    side_bar.classList.remove('animate__fadeOutLeft');
    side_bar.classList.remove('d-md-none');
    side_bar.classList.remove('d-none');
    side_bar.classList.add('animate__fadeInLeftBig');
}
async function dong_side() {
    side_bar.classList.add('animate__fadeOutLeft');
    side_bar.classList.remove('animate__fadeInLeftBig');
    await sleep(700);
    side_bar.classList.add('d-md-none');
    side_bar.classList.add('d-none');
}
function getMusic(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('phatnhac').innerHTML =
                this.responseText;
        }
    };
    xhttp.open('GET', '../chucnang/xuly.php?id_music=' + id, true);
    xhttp.send();
}
ds_nhac();
function ds_nhac() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('list_song').innerHTML =
                this.responseText;
        }
    };
    xhttp.open('GET', '../chucnang/list_song_library.php', true);
    xhttp.send();
}
ds_nhac_playlist();
function ds_nhac_playlist() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('list_song_playlist').innerHTML =
                this.responseText;
        }
    };
    xhttp.open('GET', '../chucnang/list_song_playlist.php', true);
    xhttp.send();
}
function ds_nhac_sort() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('list_song').innerHTML =
                this.responseText;
        }
    };
    xhttp.open('GET', 'http://localhost/baitapnhomphp/chucnang/list_song_library.php?sapxep=true', true);
    xhttp.send();
}



var show_bottom = true;
var change = true;
var turnoff = true;
var old_volume = 0;
var arrow = document.getElementById('arrow');
var music = document.getElementById("music-run");
var icon_play = document.getElementById("icon_play");
var time_line = document.getElementById('time_line');
var time_duration = document.getElementById('time_duration');
var time_current = document.getElementById('time_current');
var volume = document.getElementById('volume');
var volume_btn = document.getElementById('volume_btn');
var i = 0;
var hienbottom = document.getElementById('bottomfixed');
function bottom_show(){
    
    if(show_bottom==true)
    {
        hienbottom.classList.add("close1");
        hienbottom.classList.remove("show");
        arrow.innerHTML="expand_less";
        show_bottom=false;
    }
    else
    {
        hienbottom.classList.add("show");
        hienbottom.classList.remove("close1");
        arrow.innerHTML="expand_more";
        show_bottom=true;
    }
}
timeline();
var oldcl = "";
var name_file_cmt;
async function changeMusic(name){
    get_comment(name);
    name_file_cmt = name;
    var anh_to = document.getElementById('anh_to');
    if(oldcl !="")
    {
        var old_click = document.getElementById(oldcl);
        old_click.classList.remove("song-click");
    }

        var new_click = document.getElementById(name+'div');
        new_click.classList.add("song-click");
        oldcl = name+'div';
    
    
    music.src = "../music/"+name;
    change = true;
    await sleep(500);
    play();
    getMusic(name);
    var xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../chucnang/view_count.php?file_name=' + name, true);
    xhttp.send();
    if(anh_to!=null)
    {
        name = name.slice(0,-4);
        anh_to.src = "../music/anh/"+name+".jpg";
    }
}
function get_comment(file_name){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('noidung_bl').innerHTML =
                this.responseText;
        }
    };
    xhttp.open('GET', '../chucnang/get_comment.php?file_name=' + file_name, true);
    xhttp.send();
}
function play() {
    if (change == true) {
        icon_play.innerHTML = "pause";
        music.play();
        time_duration.innerHTML =changeTime(Math.round(music.duration));
        change = false;
    }
    else {
        icon_play.innerHTML = "play_arrow";
        music.pause();
        change = true;
    }
}

async function timeline(){
    while(true)
    {
        await sleep(1000);
        time_line.addEventListener('click',function(){
            setCurTime(time_line.value);
        });
        volume.addEventListener('click',function(){
            setVolume(volume.value);
        });
        time_current.innerHTML = changeTime(Math.round(music.currentTime));
        time_line.value = Math.floor((Math.floor(music.currentTime)/Math.floor(music.duration))*100);
    }
}
function turnoff_music(){
    if(turnoff==true)
    {
        volume_btn.innerHTML ="volume_off";
        music.muted = true;
        turnoff=false;
    }
    else
    {
        volume_btn.innerHTML ="volume_up";
        music.muted = false;
        turnoff=true;
    }
}
document.addEventListener('keydown', function (event) {
    if (event.keyCode === 32) 
    {
        if (change == true) 
        {
            icon_play.innerHTML = "pause";
            music.play();
            time_duration.innerHTML =changeTime(Math.round(music.duration));
            change = false;
        }
        else 
        {
            icon_play.innerHTML = "play_arrow";
            music.pause();
            change = true;
        }
    }
});
window.addEventListener('keydown', function(e) {
    if(e.keyCode == 32 && e.target == document.body) {
        e.preventDefault();
    }
    });
function setCurTime(time) { 
    music.currentTime=Math.floor((time*Math.floor(music.duration))/100);
}
function setVolume(value){
    music.volume = value/100;
} 
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
function changeTime(second){
    var min = Math.floor(second/60);
    if(min<10)
        min = "0"+min;
    var sec = second - min*60;
    if(sec<10)
        sec = "0"+sec;
    return min + ":" + sec;
}

var ketqua = document.getElementById('ketqua_tk');
function hien_ketqua(){
    ketqua.classList.remove("d-md-none");
}
async function dong_ketqua(){
    await sleep(500);
    ketqua.classList.add("d-md-none");
}
function tim_kiem(){
    var tu_khoa = document.getElementById("timkiem_box").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('ketqua_tk').innerHTML =
                this.responseText;
        }
    };
    xhttp.open('GET', '../chucnang/timkiem.php?tukhoa=' + tu_khoa, true);
    xhttp.send();
}
var old_id_playlist = [];
function add_to_playlist(id){
    var flag =true;
    var id_nhac = id.substring(5);
    for(var i =0;i<old_id_playlist.length;i++)
    {console.log(old_id_playlist[i]);
        if(old_id_playlist[i]==id_nhac)
        {
            flag = false;
        }
    }
    if(flag==true)
    {
        open_thongbao();
        old_id_playlist.push(id_nhac);
        document.getElementById(id).classList.remove("material-icons-outlined");
        document.getElementById(id).classList.add("font-lato-heavy");
        document.getElementById(id).innerHTML="Đã Thêm";
        var xhttp = new XMLHttpRequest();
        xhttp.open('GET', 'http://localhost/baitapnhomphp/chucnang/add_to_playlist.php?id_nhac=' + id_nhac , true);
        xhttp.send();
    }
    
}

//Thông báo sau khi thêm playlist
var thongbao = document.getElementById('thong_bao');
//hàm mở thông báo và các điều kiện kèm theo
function open_thongbao() {
        thongbao.showModal();
        thongbao.classList.remove("animate__backOutUp");
        thongbao.classList.add("animate__bounceInDown");

}
//hàm đóng thông báo
async function close_thongbao() {
    thongbao.classList.add("animate__backOutUp");
    thongbao.classList.remove("animate__bounceInDown");
    await sleep(600);
    thongbao.close();
}
var chinhsua = document.getElementById('chinhsua');
//hàm mở thông báo và các điều kiện kèm theo
function open_chinhsua() {
        chinhsua.showModal();
        chinhsua.classList.remove("animate__backOutUp");
        chinhsua.classList.add("animate__bounceInDown");

}
//hàm đóng thông báo
async function close_chinhsua() {
    chinhsua.classList.add("animate__backOutUp");
    chinhsua.classList.remove("animate__bounceInDown");
    await sleep(600);
    chinhsua.close();
}
var loop_flag = true;
function loop(){
    var loop_button = document.getElementById('loop_btn');
    var audio = document.getElementById('music-run');
    if(loop_flag==true)
    {
        audio.loop = true;
        loop_button.classList.add('button-clicked');
        loop_flag=false;
    }
    else
    {
        audio.loop = false;
        loop_button.classList.remove('button-clicked');
        loop_flag=true;
    }
}
