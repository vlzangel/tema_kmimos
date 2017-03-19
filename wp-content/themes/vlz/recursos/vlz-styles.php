<style type="text/css">
	
	body{
		margin: 0px;
	    padding-top: 100px;
	}

	header{
	    position: absolute;
	    top: 0px;
	    left: 0px;
	    width: 100%;
	    height: 110px;
	    background: #59c9a8;
	    box-sizing: border-box;
	    padding: 0px;
	    margin: 0px;
	}

	/* Menu */
		.contenedor_logo{
		    position: absolute;
		    left: 0px;
		    top: 0px;
		    width: 200px;
		    height: 80px;
		    background-position: left center;
		    background-repeat: no-repeat; 
		    display: inline-block;
		}

		#site-navigation{
			position: relative;
			max-width: 1150px;
    		margin: 0px auto;
	        height: 80px;
		}
		#site-navigation a{
			text-decoration: none;
		    font-family: "Open Sans";
    		font-size: 15px;
		}
		.contenedor_menu{
			float: right;
		}
		#menu-main{
		    list-style: none;
		    padding: 0px;
		    margin: 0px;
		    text-align: right;
		    vertical-align: top;
		}
		#menu-main li{
			display: inline-block;
			padding: 0px;
			margin: 0px;
			vertical-align: top;
			text-align: left;
			float: left;
			position: relative;		
		}
		#menu-main > li > a {
			padding: 30px 10px;
			display: inline-block;
    		color: #FFF;
    		transition-duration: 0.2s;
		}
		#menu-main > li:hover > a {
    		background: rgba(255, 255, 255, 0.3);
    		transition-duration: 0.2s;
		}
		#menu-main .sub-menu{
			max-width: 200px;
		}
		#menu-main > li > .sub-menu{
			position: absolute;
		    margin: 0px;
		    padding: 0px;
		    min-width: 214px;
    		display: none;
		}

		#menu-main > li.menu-item-has-children > a{
			padding: 30px 25px 30px 10px;
		}

		#menu-main > li.menu-item-has-children::after{
		    content: '';
		    position: absolute;
		    top: calc( 50% - 2px );
		    right: 5px;
		    border-top: solid 10px #FFF;
		    width: 0;
		    height: 0;
		    border-left: 5px solid transparent;
		    border-top: 5px solid #ffffff;
		    border-right: 5px solid transparent;
		}

		#menu-main > li > .sub-menu li{
    		display: block;
			float: none;
		}
		#menu-main .sub-menu li > a{
    		display: block;
    		padding: 10px;
    		background: #FFF;
    		font-size: 15px;
    		transition-duration: 0.2s;
		}
		#menu-main .sub-menu li > a:hover{
			color: #FFF;
	   	 	background: #59c9a8;
    		transition-duration: 0.2s;
		}

		#menu-main > li > .sub-menu li a{
			color: #757575;
		}

		#menu-main > li:hover > .sub-menu{
    		display: inline-block;
		}

		#site-navigation-user{
		    width: 100%;
		    height: 30px;
		    background: #23475e;
		}

		#site-navigation-user .secundary-menu{
		    position: relative;
		    max-width: 1150px;
		    margin: 0px auto;
		}

		#site-navigation-user .contenedor_menu_externo{
		    max-width: 1150px;
		    margin: 0px auto;
		}

		#site-navigation-user .secundary-menu{
			list-style: none;
		}

		#site-navigation-user .secundary-menu li{
			float: left;
		}

		#site-navigation-user .secundary-menu li a{
			color: #FFF;
			padding: 7px 10px;
			text-decoration: none;
			font-size: 14px;
			font-family: "Roboto Condensed",Arial, Helvetica, sans-serif;
			display: inline-block;
		}

		#site-navigation-user .secundary-menu li a:hover{
		    background: rgba(255, 255, 255, 0.2);
		}

</style>