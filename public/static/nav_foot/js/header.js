// mobile
    	var mobile = document.querySelector(".mobile");
    	var mobile_login = document.querySelector(".mobile .mobileBox #mobileLoginBtn");
    	var mobileMenuBtn = mobile.querySelector(".mobileBox #mobileMenuBtn");
    	var mobileList = document.querySelector(".mobileList");
        var qx = mobileList.querySelector("span");
    	var mobileBox = mobile.querySelector(" .mobileBox");
    	// 
        var headerout = document.querySelector(".zaih_headerout");
    	var header_nav = document.querySelector(".zaih_headerout .header .header_nav");
    	var navLi = header_nav.querySelectorAll(".header .header_nav>li");
    	var more_menu = header_nav.querySelector(".header_more .more_menu");
    	var menuLi = header_nav.querySelectorAll(".header_more .more_menu >li");
    	// 登录部分
        var login_container = document.querySelector(".login_container");
    	var header_login = document.querySelector(".zaih_headerout .header .header_setting .header_login");
    	var login_box = document.querySelector(".login_container .login_box");
    	var back = login_box.querySelector(".back");
    	var login = login_box.querySelector(".login");
        var loginQx = login_box.querySelector(".login>span");
        for(var i=1;i<navLi.length;i++){
            // console.log(navLi[i],i)
            navLi[i].onmouseover=function(){
                navLi[0].style.left = this.offsetLeft + 'px';
                navLi[0].style.width = this.offsetWidth + 'px';
            }
        }
        header_nav.onmouseout=function(){
            navLi[0].style.width = '0px';
        }
        navLi[navLi.length-1].onmouseover=function(){
            more_menu.style.height = '190px';
            this.style.background='#fff';
            this.childNodes[1].style.color = '#ff946e';

            navLi[0].style.left = this.offsetLeft + 'px';
            navLi[0].style.width = this.offsetWidth + 'px';
        }
        navLi[navLi.length-1].onmouseout=function(){
            more_menu.style.height = '0px';
            this.style.background='transparent';
            this.childNodes[1].style.color = '#fff';
        }
        // 更多 子项
        for(var j=0;j<menuLi.length;j++){
            menuLi[j].onmouseover=function(){
                this.style.background = '#ff946e';
                this.childNodes[1].style.color = '#fff';
            }
            menuLi[j].onmouseout=function(){
                this.style.background = '#fff';
                this.childNodes[1].style.color = '#343434';
            }
        }
    	// 点击登录
    	header_login.onclick = function(){
    		login_box.style.display = 'block';
            login_container.style.display = 'block';
    	}
    	loginQx.onclick = function () {
    		this.parentNode.parentNode.style.display = 'none';
            login_container.style.display = 'none';
    	}
    	login.onclick = function(ev){
    		var oEvent= ev || event;
        	oEvent.cancelBubble=true;
    	}

    	// mobile登录
    	mobile_login.onclick = function(){
    		login_box.style.display = 'block';
            login_container.style.display = 'block';
    	}
    	loginQx.onclick = function () {
    		this.parentNode.parentNode.style.display = 'none';
             login_container.style.display = 'none';
    	}
    	login.onclick = function(ev){
    		var oEvent= ev || event;
        	oEvent.cancelBubble=true;
    	}
    	// 
        console.log(qx)
        console.log(mobileList)
    	mobileMenuBtn.onclick = function(){
    		mobileBox.style.display='none';
    		mobileList.style.display='block';
    	}
    	qx.onclick = function(){
            console.log(1)
    		mobileBox.style.display='block';
    		mobileList.style.display='none';
    	}
