var gh_tensanpham = document.querySelector('#gh_tensanpham');
var gh_id_sp = document.querySelector('#id_gh_sanpham');
var gh_hinhanhsp = document.querySelector('#gh_hinhanhsanpham');
var gh_giasp = document.querySelector('#gh_giasanpham');
var gh_gia_kh_sp = document.querySelector('#gh_giasanpham_km');
var gh_cauhinhsanpham = document.querySelector('#gh_cauhinhsanpham');
var gh_ct_soluong_sp=document.querySelector('#input_sl');

var data_gh = [
    // {
    //     product: {
    //         id_gh: '01',
    //         tensp: 'Acer Swift 3 14 AMD (Chính hãng) (SF314-43-R4X3)',
    //         hinhanhsp: 'hinhanhsp/1.png',
    //         cauhinh: 'AMD RYZEN5 - 8GB - SSD 512GB - Màn hình 15.6',
    //         giasp: '10.000.000',
    //         giakhuyenmai: '9.000.000'
    //     },
    //     quantity:1,

    // },
    // {
    //     product: {
    //         id_gh: '02',
    //         tensp: 'Acer Swift 3 14 AMD (Chính hãng) (SF314-43-R4X3)',
    //         hinhanhsp: 'hinhanhsp/1.png',
    //         cauhinh: 'AMD RYZEN5 - 8GB - SSD 512GB - Màn hình 15.6',
    //         giasp: '10.000.000',
    //         giakhuyenmai: '9.000.000'
    //     },
    //     quantity:1,

    // },
    // {
    //     product: {
    //         id_gh: '03',
    //         tensp: 'Acer Swift 3 14 AMD (Chính hãng) (SF314-43-R4X3)',
    //         hinhanhsp: 'hinhanhsp/1.png',
    //         cauhinh: 'AMD RYZEN5 - 8GB - SSD 512GB - Màn hình 15.6',
    //         giasp: '10.000.000',
    //         giakhuyenmai: '9.000.000'
    //     },
    //     quantity:1,

    // },
    // {
    //     product: {
    //         id_gh: '04',
    //         tensp: 'Acer Swift 3 14 AMD (Chính hãng) (SF314-43-R4X3)',
    //         hinhanhsp: 'hinhanhsp/1.png',
    //         cauhinh: 'AMD RYZEN5 - 8GB - SSD 512GB - Màn hình 15.6',
    //         giasp: '10.000.000',
    //         giakhuyenmai: '9.000.000'
    //     },
    //     quantity:1,

    // },
    
]


// localStorage.setItem('data_gh',JSON.stringify(data_gh));
// let lastname = localStorage.getItem('data_gh');
// console.log(lastname);

var add_cart_sp = document.querySelector('#add_cart_sp');
// console.log(add_cart_sp)
// data_gh=JSON.parse(localStorage.getItem('data_gh'));
// console.log(data_gh);
// localStorage.setItem('data_gh', JSON.stringify(data_gh));

// console.log(data_gh_new)
// for(var i=0; i<data_gh_new.length; i++){
// data_gh = data_gh_new;
// console.log(data_gh);
// }

// console.log(gh_ct_soluong)
add_cart_sp.addEventListener('click', function () {
    // console.log(gh_ct_soluong_sp.value);
    var storage =localStorage.getItem('data_gh');
    if(storage){
        data_gh=JSON.parse(storage);
    }
    var item=data_gh.find(quantitysp => quantitysp.product.id_gh==gh_id_sp.value);
    if(item){
        // console.log( typeof parseInt(gh_ct_soluong_sp.value));

        item.quantity += parseInt(gh_ct_soluong_sp.value);
        console.log( item.quantity);
    }else{
        data_gh.push({
            product: {
                id_gh:gh_id_sp.value,
                tensp: gh_tensanpham.value,
                hinhanhsp: 'hinhanhsp/'+gh_hinhanhsp.value,
                cauhinh:gh_cauhinhsanpham.value,
                giasp: gh_giasp.value,
                giakhuyenmai: gh_gia_kh_sp.value,
            },
            quantity:parseInt(gh_ct_soluong_sp.value),
    
        });
    }
    
    localStorage.setItem('data_gh',JSON.stringify(data_gh));
    // alert('Thêm sản phẩm thành công !');
    swal("Good","Thêm sản phẩm thành công !","success").then(()=>{
        window.location='giohang.php';
    })
  
})

