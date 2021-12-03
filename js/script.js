const host='http://localhost/';
const stored_region = document.querySelector(".stored_region").innerHTML;
const elemsListParent = document.querySelector(".region");
const tabs = document.querySelector(".transaction-type");
const propertyBtn = document.querySelector("body");
const selectLocation = document.querySelector(".refine-search");
const alertMessageWrap =document.querySelector('.property-alert');
	 const alertMessage =document.querySelector('.property-alert p');
const tabSpan = document.querySelectorAll(".transaction-type .tabs span");
const overlay = document.querySelector(".close-filters");
const getMessageBox = document.querySelector(".get-in-touch")!=null ? document.querySelector(".get-in-touch") : null;
const mobileSearch = document.querySelector(".mobile-search")!=null ? document.querySelector(".mobile-search") : null;
const filterMessageTab= document.querySelector(".filter-tab");
const loading = () =>{
		filterMessageTab.classList.add("alert-success");
		filterMessageTab.classList.remove("alert-warning");
		filterMessageTab.style="display:block";
		filterMessageTab.innerHTML="Loading your filters...";
	}
const selectPropertyWarning = () =>{
	filterMessageTab.style="display:block;";
		filterMessageTab.classList.remove("alert-success");
		filterMessageTab.classList.add("alert-warning");
		filterMessageTab.innerHTML="Please select property type first";
}
let filterArray = [];
	filterArray['transaction']='buy';
	filterArray['property']='';
	filterArray['house']='';
	filterArray['room']='2';
	filterArray['price']=15000000;
	filterArray['lga']='';
	filterArray['region']=stored_region;
	filterArray['calculate_room']='';
	filterArray['calculate_price']='';


const filters=['property','house','transaction','region','lga'];
const property_types=['Land','Farm','Forest','Marine','Energy'];
const formatNumber =(number) =>{
		number=String(number).split(",");
		let count=number.length;
		for(let i=0; i<count; i++){
		number=String(number).replace(",","");	
		}
		number=Number(number);
		let formatter = new Intl.NumberFormat()
		return formatter.format(number);
	}
const scrollIntoView = (el) => {
	let top = el.offsetTop;
  let left = el.offsetLeft;
  let width = el.offsetWidth;
  let height = el.offsetHeight;

  while(el.offsetParent) {
    el = el.offsetParent;
    top += el.offsetTop;
    left += el.offsetLeft;
  }

  return (
    top < (window.pageYOffset + window.innerHeight) &&
    left < (window.pageXOffset + window.innerWidth) &&
    (top + height) > window.pageYOffset &&
    (left + width) > window.pageXOffset
  );
}	
const filteredValues = (checkedValue,type) =>{
	loading();
	  if(checkedValue=="property"){
	document.querySelector(".price-values").value="";	
	document.querySelector(".room-values").value="";	
	filterArray['room']=0;
	filterArray['price']=0;
	filterArray['house']='';
	}
	if(checkedValue=="region"){
	filterArray['lga']='';	
	} 

	if(filters.indexOf(checkedValue)>-1){
	filterArray['calculate_room']='';
	filterArray['calculate_price']='';	
	}else{
		if(checkedValue=='room'){
			filterArray['calculate_room']='get';
		}else if(checkedValue=='price'){
			filterArray['calculate_price']='get';
		}
	//filterArray['calculate']='get';	
	}
	let filterBoxes='You want to ';
	let messageBoxes='I want to ';
	filterArray[checkedValue]=type;
	let sender='';
	let parameters='';
	let conjunction='';
	for(x in filterArray){
		sender+=x+'='+filterArray[x]+'&';
		if(filterArray[x]!="" && x!=='calculate_room' && x!=='calculate_price'){
		parameters+=x+'_'+filterArray[x]+'--';
	}
	}
	sender=sender.slice(0,-1);
	parameters=host+'properties/search/?req='+parameters.slice(0,-2)+"--page_1";
	//console.log(sender)
	  const http = new XMLHttpRequest();
	 const url =host+"properties/fetch_properties.php";
	 http.open('POST',url,true);
    let resp;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onload = function(){
            if(http.status===200){
				//console.log(http.responseText.trim())
				for(x in filterArray){
	let closeBtn ='<sup class="close-filter-selection" title="Remove '+x+'" data-value="'+x+'">&times;</sup>';
		if(x!=='calculate_room' && x!=='calculate_price' && filterArray[x]!=""){
			if(x=="room" || x=="price"){
				if(x=="room" && filterArray['room']>0){
					conjunction=' with ';
					filterBoxes+=' '+conjunction+'<strong>'+formatNumber(filterArray[x])+' '+x+'s</strong>'+closeBtn+' max,';
					messageBoxes+=' '+conjunction+formatNumber(filterArray[x])+' '+x+'s max,';
				}else if(x=="price" && filterArray['price']>0){
					conjunction=' at ';
					filterBoxes+=conjunction+'<strong>&#8358;'+formatNumber(filterArray[x])+'</strong>'+closeBtn+' max ';
					messageBoxes+=conjunction+formatNumber(filterArray[x])+' Naira max ';
				}
	
			}else{
				if(x=="region"){
					conjunction='';
					if(filterArray['lga']==""){
						conjunction=' in ';
					}
					filterBoxes+=conjunction+' <strong>'+filterArray[x]+'</strong>.'+closeBtn;	
					messageBoxes+=", "+filterArray[x]+'.';	
				}else if(x=="lga"){
					conjunction=' in ';
					filterBoxes+=' in <strong>'+filterArray[x]+'</strong>,'+closeBtn;	
					messageBoxes+=' in '+filterArray[x];	
				}else if(x=="property"){
					conjunction=' a ';
					filterBoxes+=conjunction+'<strong>'+filterArray[x].toLowerCase()+' property</strong> ';	
					messageBoxes+=conjunction+filterArray[x]+' property ';	
				}else if(x=="house"){
					filterBoxes+=' (<strong>'+filterArray[x]+'</strong>)'+closeBtn;	
					messageBoxes+=' ('+filterArray[x]+')';	
				}else{
			filterBoxes+=conjunction+'<strong>'+filterArray[x]+'</strong> ';	
			messageBoxes+=conjunction+filterArray[x]+' ';	
			}
			}
		}
	}
				let data=Number(http.responseText.trim());
				let plural='property';
				if(isNaN(data)){
					data=0;
				}
				if(data==0){
							filterBoxes+=' but we have no property that match your search at the moment. Kindly <a href="" class="chat-us btns" title="Chat Us"><i class="fab fa-whatsapp"></i> Chat Us</a> <span class="conjunction">or</span> <strong class="btn btns send-message-btn no-p-btn">Send a message</strong>. We might have something for you.';
				document.querySelector(".filter-tab").classList.remove("alert-success");
				document.querySelector(".filter-tab").classList.add("alert-warning");
				setTimeout(function(){
				if(document.querySelector(".chat-us")!=null){
				document.querySelector(".chat-us").setAttribute("href","https://wa.me/2347067920578?text="+messageBoxes);
				}
				},200);}else{
					data<2 ? plural='property' : plural='properties';
					filterBoxes+=' <a href="'+parameters+'" class="btn-go">View the <span class="badge badge-success">'+data+'</span> '+plural+' we have</a>';
					document.querySelector(".filter-tab").classList.add("alert-success");
					document.querySelector(".filter-tab").classList.remove("alert-warning");
				}
				//document.querySelector(".filtered span").innerText=data;
				if(	filterArray['property']!=''){
				document.querySelector(".filter-tab").style="display:block";
				document.querySelector(".filter-tab").innerHTML=filterBoxes;
				document.querySelector(".property-message").value=messageBoxes+' Kindly get back to me as soon as possible. Thank you.';
			}
            }
    }
    http.send(sender);
}
class Tools{
	
	switchTabs = (e)=>{
	tabSpan.forEach(function(tab){
		tab.classList.remove('active-tab');
	});
	let tab = e.target.classList;
	let current;
	if(tab.contains('options')){
		e.target.classList.add("active-tab")
		current = e.target.getAttribute('data-target');
		document.querySelector('.selected_tab').value=current; 
		if(filterArray['property']!=''){
		    filterArray['transaction']=current;
		filteredValues("transaction",current);
		}else{
			selectPropertyWarning();
		}
	}
}

 selects = (e)=>{
		let checker = e.target.classList;
		if(checker!=null){
		let type,checkedValue;
		const checks = document.querySelectorAll(".properties li i");
		const lists = document.querySelectorAll(".properties li");
		const parentProperty = document.querySelector(".properties");
		checks.forEach(function(ck){
			ck.className="fa fa-square-o square";
			ck.parentElement.setAttribute("data-status","check");
		});
		lists.forEach(function(list){
			list.classList.remove("sec-lists-active");
		});
		if(checker.contains("square")){
			type = e.target.parentElement.getAttribute("data-value");
			checkedValue = e.target.parentElement.getAttribute("data-type");
			e.target.parentElement.setAttribute("data-status","checked");
			e.target.parentElement.classList.add("sec-lists-active");
			e.target.className="fa fa-check-square-o square";
		}else{
			type = e.target.getAttribute("data-value");
			checkedValue = e.target.getAttribute("data-type");
			e.target.setAttribute("data-status","checked");
			e.target.children[0]!='undefined' ? e.target.children[0].className="fa fa-check-square-o" : '';
			e.target.classList.add("sec-lists-active");
			controlSelection(e.target,parentProperty);
		}
		let values = document.querySelectorAll(".types-of");
		values.forEach(function(val){
			val.style="display:none;";
		});
	filteredValues(checkedValue,type);
	
			if(type=="Residential" || type=="New Build"){
				document.querySelector(".house-type").style="display:block;";
			}
			if(property_types.indexOf(type)==-1){
				document.querySelector(".value-type").style="display:block;";
			}
		
	}
}

 displays =(div,action) =>{
	 action == "show" ? document.querySelector('.'+div).classList.add("show") : document.querySelector('.'+div).classList.remove("show")
 }
 
	
  getLocation = (val=stored_region,url)=>{
	 const http = new XMLHttpRequest();
	 http.open('POST',url,true);
    let resp;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onload = function(){
            if(http.status===200){
				//alert(http.responseText);
				 resp = JSON.parse(http.responseText);
				 document.querySelector(".sec-adv-search .towns").innerHTML="<li class='list-group-item'>Loading LGAs...</li>";
				if(resp!=''){
				 document.querySelector(".sec-adv-search .towns").innerHTML="";
				let x,localTown,li;
				document.querySelector(".towns-head").innerHTML=val.toUpperCase();
				
					resp.forEach(function(x){
				if(x.state.name.indexOf(val)!==-1){
					localTown=x.state.locals;
					 localTown.forEach(function(town){
						li="<li class='list-group-item' data-status='check' data-type='lga' data-value='"+town.name.trim()+"'><i class='fa fa-square-o'></i> "+town.name.trim()+"</li>";
						document.querySelector(".sec-adv-search .towns").innerHTML+=li;
					}); 
				}
					})
			}else{
			document.querySelector(".sec-adv-search .towns").innerHTML="<li class='list-group-item'>Please select another region</li>";	
			document.querySelector(".towns-head").innerHTML="No Data";	
			}
    
            }
    }
    http.send('region='+val);
 }

getData = (val=stored_region,url)=>{
	 const http = new XMLHttpRequest();
	 http.open('POST',url,true);
    let resp,x,localTown,li;
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onload = function(){
            if(http.status===200){
				 resp = JSON.parse(http.responseText);
				 
				 if(resp!=''){
				 document.querySelector(".get-lga").innerHTML="<option value=''>--Select LGA--</option>";
				 resp.forEach(function(x){
				if(x.state.name.indexOf(val)!==-1){
					localTown=x.state.locals;
					 localTown.forEach(function(town){
						li="<option value='"+town.name.trim()+"'>"+town.name.trim()+"</option>";
						document.querySelector(".get-lga").innerHTML+=li;
					}); 
				}
					})
			}else{
				li="<option value=''>--Select LGA--</option>";
				document.querySelector(".get-lga").innerHTML+=li;
			}
			
            }
    }
    http.send('region='+val);
 }
 
 getServices = (val,url,optionText)=>{
	 const http = new XMLHttpRequest();
	 http.open('POST',url,true);
    let resp,content='';
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onload = function(){
            if(http.status===200){
				 resp = JSON.parse(http.responseText);
				 if(resp!=''){
				 resp.forEach(function(x){
				  let template='<div class="col-sm-6 col-md-4 col-lg-4 col-12"><div class="services-card">'
				  template+='<div class=" row"><div class="services-wrap col-sm-12 col-12 col-md-12">'
					template+='<div class="services-avatar-wrap"><img src="../'+x.image+'" alt="'+x.company+'" /></div>'
			template+='<p><strong class="company-'+x.id+'">'+x.company+'</strong></p></div>'
			template+='<div class="services-desc  col-sm-12 col-12 col-md-12"></p>'+x.description+'</p>'
			template+='<p class="btns btn btn-primary send-message-btn service-message" id="'+x.id+'">Get in touch</p></div></div></div></div>';
			content+=template;
					});
				document.querySelector(".collect-services").innerHTML=content;
			}else{
				content="<div class='none-returned'><p>No Service provider found for \""+optionText.trim()+"\"</p> <p class='btn btn-primary bold join-service'>Join now</p> <p>or</p> <p class='btn btn-primary bold send-message-btn'>Contact Us</p></div>";
				document.querySelector(".collect-services").innerHTML=content;
			}
			
            }
    }
    http.send('service_type='+val);
 }
 
 postData = (elem,val,url)=>{
	 const http = new XMLHttpRequest();
	 let emptyFileds=0;
	 const requiredFieilds =document.querySelectorAll('.'+elem+' .required');
	 let inputs='';
	 requiredFieilds.forEach(function(field){
	  inputs = field.value;
	 
	 if(inputs==""){
		 if(emptyFileds==1){
		 alertMessage.innerHTML='<i class="fa fa-warning" aria-hidden="true"></i> Fill in required fields';
	 }
			alertMessageWrap.classList.remove('alert-success'); 
			alertMessageWrap.classList.add('alert-warning'); 
			alertMessageWrap.classList.add('show');
setTimeout(function(){
	alertMessageWrap.classList.remove('show');
				alertMessageWrap.classList.add('hide');
				},7000)			
		field.classList.add('wrong'); 
		emptyFileds++;
	 }else{
		field.classList.remove('wrong');
		alertMessageWrap.classList.remove('show');
		setTimeout(function(){
				alertMessageWrap.classList.add('hide');
				},5000)
	 }
});
if(emptyFileds==0){
	 http.open('POST',url,true);
    let resp;
    //http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onload = function(){
            if(http.status===200){
				 resp = http.responseText.trim();
				 console.log(resp);
				 if(resp=='Thanks'){
					 alertMessage.innerHTML='Thank you for trusting Us';
				alertMessageWrap.classList.remove('alert-warning'); 
				alertMessageWrap.classList.add('alert-success'); 
				alertMessageWrap.classList.add('show');
				setTimeout(function(){
				alertMessageWrap.classList.remove('show');
				alertMessageWrap.classList.add('hide');
				},5000);
				//document.querySelector('.property-form').reset();
			}else{
	
			}
			
            }
    }
    http.send(val);
 }
 }
 
}
const tool = new Tools;

 propertyBtn.addEventListener("click",function(e){
	 if(e.target.classList.contains("get-property") || e.target.parentElement.classList.contains("get-property")){
	 document.querySelector(".sec-adv-search").style="display:block";
	 document.querySelector('body').classList.add('freeze');
	 document.querySelector(".filter-col")!=null ?  document.querySelector(".filter-col").scrollTop=0 : null;
	  if(document.querySelector(".filter-col ul")!=null){	
	document.querySelectorAll(".filter-col ul").forEach(function(list){
	list.scrollTop=0;	
	});
	 }
 }
 });
 
tabs.addEventListener("click",tool.switchTabs);
 selectLocation.addEventListener("click",function(){
	 document.querySelector(".sec-adv-search")!=null ? document.querySelector(".sec-adv-search").style="display:block" : null;
	 	 document.querySelector('body').classList.add('freeze');
		 
	if(document.querySelector(".filter-col ul")!=null){	 
	 document.querySelector(".filter-col ul").scrollTop=0;
	document.querySelectorAll(".filter-col ul").forEach(function(list){
	list.scrollTop=0;	
	});
 }
 });
 if(mobileSearch!=null){
 mobileSearch.addEventListener("click",function(){
	 document.querySelector(".sec-adv-search").style="display:block";
 });
 }
 
 overlay.addEventListener("click",function(){
	document.querySelector(".sec-adv-search").style="display:none";
		 document.querySelector('body').classList.remove('freeze');
	document.querySelector(".filter-tab").innerHTML="";
	document.querySelector(".filter-tab").style="display:none;";
	let allFilters =document.querySelectorAll(".filter-col ul li i");
	let allFiltersWrap =document.querySelectorAll(".filter-col ul li");
	allFilters.forEach(function(ck){
			ck.className="fa fa-square-o square";
			ck.parentElement.setAttribute("data-status","check");
		});
		allFiltersWrap.forEach(function(list){
			list.classList.remove("sec-lists-active");
		});
		filterArray['transaction']='buy';
	filterArray['property']='';
	filterArray['house']='';
	filterArray['room']='2';
	filterArray['price']=5000000;
	filterArray['lga']='';
	filterArray['region']=stored_region;
	filterArray['calculate_room']='';
	filterArray['calculate_price']='';
});

	const btn = document.querySelector(".region");
	const plusBtn = document.querySelector(".get-values");
	const townsBtn = document.querySelector(".towns");
	const propertiesBtn = document.querySelector(".properties");
	const housesBtn = document.querySelector(".select-house-type");
	const closeFilterSelectionBtn = document.querySelector(".filter-tab");
	const allBtns = document.querySelector("body");
	 //const closeFilterMessage = document.querySelector(".form-wraps")!=null ? document.querySelector(".message-sender-wrap") : null;
	if(allBtns!=null){
	allBtns.addEventListener("click",function(e){
		if(e.target.classList.contains("close-message")){
			document.querySelectorAll(".form-wraps").forEach((form)=>{
				form.style="display:none;";
			});
		}
		else if(e.target.classList.contains("form-input")){
			e.target.style.border="1px solid #ccc";
		}
		else if(e.target.classList.contains("service-message")){
			let id =e.target.id;
			let companyName = document.querySelector(".company-"+id).innerHTML;
			document.querySelector(".service-name").value=companyName;
		}
		else if(e.target.classList.contains("search-services")){
			const serviceType=document.querySelector(".select-service-type").value;
			let service=document.querySelector(".select-service-type");
			service=service.options[service.selectedIndex].text;
			const url =host+"properties/get_services.php";
			tool.getServices(serviceType,url,service);
		}
		else if(e.target.classList.contains("send-services")){
					let formdata= new FormData()
					const inputs =document.querySelectorAll(".provider-form-wrap .form-input");
					e.preventDefault();
					 inputs.forEach(function(input){
						  console.log(input.type);
						 if(input.type=="file"){
							 let filename=input.value.split("\\");
							 console.log(filename[filename.length-1],input.name);
						formdata.append(input.name,input.files[0],filename[filename.length-1]);	 
						 }else{
						formdata.append(input.name,input.value);
						 }
					});
					tool.postData('provider-form-wrap',formdata,host+"properties/post_services.php");
		}
	});
	}
	
	closeFilterSelectionBtn.addEventListener("click",function(e){
		let cl = e.target.classList;
		let targeted='';
		if(cl.contains("close-filter-selection")){
			targeted=e.target.getAttribute("data-value");
			filterArray[targeted]='';
			if(targeted=="room"){
				filterArray['calculate_room']=0;
				document.querySelector(".room-values").value="";
			}else if(targeted=="price"){
				filterArray['calculate_price']=0;
				document.querySelector(".price-values").value="";
			}
			filteredValues(targeted,"");
			if(targeted=="region"){
				document.querySelector(".sec-adv-search .towns").innerHTML="<li class='list-group-item'>Please select another region</li>";	
			document.querySelector(".towns-head").innerHTML="No Data";
			}
			if(targeted=="lga"){
				targeted="towns";
			}
			const checks = document.querySelectorAll("."+targeted+" li i");
			const lists = document.querySelectorAll("."+targeted+" li");
			if(checks!="undefined"){
			checks.forEach(function(ck){
				ck.className="fa fa-square-o square";
				ck.parentElement.setAttribute("data-status","check");
			});
			lists.forEach(function(list){
				list.classList.remove("sec-lists-active");
			});
		}
		
		}else if(cl.contains("send-message-btn")){
			document.querySelector(".message-sender-wrap").style="display:block;";
		}
	});
	
	btn.addEventListener("click",function(e){
		if(filterArray['property']!=''){
		document.querySelector(".towns").scrollTop=0;
		const checks = document.querySelectorAll(".region li i");
		const lists = document.querySelectorAll(".region li");
		const regionParent = document.querySelector(".region");
		let checker = e.target.classList;
		let region = e.target.getAttribute("data-value");
		let checkedValue;
		checks.forEach(function(ck){
			ck.className="fa fa-square-o square";
			ck.parentElement.setAttribute("data-status","check");
		});
		lists.forEach(function(list){
			list.classList.remove("sec-lists-active");
		});
		if(checker.contains("square")){
			region = e.target.parentElement.getAttribute("data-value");
			checkedValue = e.target.parentElement.getAttribute("data-type");
			e.target.parentElement.setAttribute("data-status","checked");
			e.target.className="fa fa-check-square-o square";
			e.target.parentElement.classList.add("sec-lists-active");
		}else{
			e.target.children[0]!='undefined' ? e.target.children[0].className="fa fa-check-square-o" : '';
			region = e.target.getAttribute("data-value");
			checkedValue = e.target.getAttribute("data-type");
			e.target.setAttribute("data-status","checked");
			e.target.classList.add("sec-lists-active");
			controlSelection(e.target,regionParent);
		}
		tool.getLocation(region,host+'properties/regions.json');
		filteredValues(checkedValue,region);
	}else{
		selectPropertyWarning();
	}
	});
	
	townsBtn.addEventListener("click",function(e){
		if(filterArray['property']!=''){
		let checker = e.target.classList;
		let town = e.target.getAttribute("data-value");
		const checks = document.querySelectorAll(".towns li i");
		const townsParent = document.querySelector(".towns");
		const lists = document.querySelectorAll(".towns li");
		let checkedValue;
		checks.forEach(function(ck){
			ck.className="fa fa-square-o square";
			ck.parentElement.setAttribute("data-status","check");
		});
		lists.forEach(function(list){
			list.classList.remove("sec-lists-active");
		});
		if(checker.contains("square")){
			town = e.target.parentElement.getAttribute("data-value");
			checkedValue = e.target.parentElement.getAttribute("data-type");
			e.target.parentElement.setAttribute("data-status","checked");
			e.target.parentElement.classList.add("sec-lists-active");
			e.target.className="fa fa-check-square-o square";
		}else{
			e.target.children[0]!='undefined' ? e.target.children[0].className="fa fa-check-square-o" : '';
			checkedValue = e.target.getAttribute("data-type");
			town = e.target.getAttribute("data-value");
			e.target.setAttribute("data-status","checked");
			e.target.classList.add("sec-lists-active");
			controlSelection(e.target,townsParent);
		}
		filteredValues(checkedValue,town);
	}else{
selectPropertyWarning();
	}
	});
	
		housesBtn.addEventListener("click",function(e){
		let checker = e.target.classList;
		let houseType = e.target.getAttribute("data-value");
		const checks = document.querySelectorAll(".select-house-type li i");
		const houseTypeParent = document.querySelector(".select-house-type");
		const lists = document.querySelectorAll(".select-house-type li");
		let checkedValue;
			checks.forEach(function(ck){
			ck.className="fa fa-square-o square";
			ck.parentElement.setAttribute("data-status","check");
		});
		lists.forEach(function(list){
			list.classList.remove("sec-lists-active");
		}); 
		if(checker.contains("square")){
			houseType = e.target.parentElement.getAttribute("data-value");
			checkedValue = e.target.parentElement.getAttribute("data-type");
			e.target.parentElement.setAttribute("data-status","checked");
			e.target.parentElement.classList.add("sec-lists-active");
			e.target.className="fa fa-check-square-o square";
		}else{
			e.target.children[0]!='undefined' ? e.target.children[0].className="fa fa-check-square-o" : '';
			checkedValue = e.target.getAttribute("data-type");
			houseType = e.target.getAttribute("data-value");
			e.target.classList.add("sec-lists-active");
			e.target.setAttribute("data-status","checked");
			controlSelection(e.target,houseTypeParent);
		}
			filteredValues(checkedValue,houseType);
			if(document.querySelector(".value-type")!=null){
			document.querySelector(".value-type").style="display:block;";
			}
	});
	
	propertiesBtn.addEventListener("click",tool.selects);
	plusBtn.addEventListener("click",function(e){
	    if(filterArray['property']!=''){
		let target=e.target.getAttribute("data-target");
		let type=e.target.getAttribute("data-type");
		if(document.querySelector("."+target+"-values")!=null){
		let noRooms=document.querySelector("."+target+"-values").getAttribute("data-value");
		let initialValue=document.querySelector("."+target+"-values").getAttribute("data-value");
		let propValue=initialValue.split(",");
		let count=propValue.length;
		let reg=new RegExp(",","gi");
		//for(let i=0; i<count; i++){
		initialValue=String(initialValue).replace(reg,"");	
		//}
		 priceadd = document.querySelector(".price-range").value;
		let add=1;
		target=="price" ? add=Number(priceadd) : add=1;
		if(type=="plus"){
			newValue=Number(initialValue)+add;
		}else if(type=="minus" && initialValue>1){
			newValue=Number(initialValue)-add;
			if(newValue<=0 && target=="price"){
				newValue=1000000;
			}
		//document.querySelector("."+target+"-values").setAttribute("data-value",tool.formatNumber(newValue));
		}
		
		if(target=="room"){
			filteredValues("calculate_room","get");
			filteredValues("room",newValue);
		}else if(target=="price"){
			 filteredValues("calculate_price","get");
			 filteredValues("price",newValue);
		}
		document.querySelector("."+target+"-values").setAttribute("data-value",formatNumber(newValue));
		document.querySelector("."+target+"-values").value=formatNumber(newValue);
		//console.log(initialValue,newValue);
	}
	    }else{
			selectPropertyWarning();
		}
	});
	allBtns.addEventListener("click",function(e){
	if(e.target.classList.contains("send-message-btn")){
		document.querySelector(".message-sender-wrap").style="display:block;";
	}else if(e.target.classList.contains("join-service")){
		document.querySelector(".provider-form-wrap").style="display:block;";
	}
	});
	
	document.querySelector(".price-values").addEventListener("change",function(e){
	    	if(filterArray['property']!=''){
		let newValue=e.target.value.replace(",","");
		filteredValues("calculate_price","get");
		console.log(newValue);
		filterArray['price']=newValue;
		filteredValues("price",newValue);
		document.querySelector(".price-values").setAttribute("data-value",newValue);
		document.querySelector(".price-values").value=newValue;
	}else{
			selectPropertyWarning();
		}
	});	
	
	if(document.querySelector(".execute")!=null){
	const sendProperty=document.querySelector(".execute");
	sendProperty.addEventListener("click",function(e){
		let val='';
		let formdata= new FormData()
		const inputs =document.querySelectorAll(".form-input");
		e.preventDefault();
		 inputs.forEach(function(value){
			formdata.append(value.getAttribute("name"),value.value);
			//val+=value.getAttribute("name")+"="+value.value+"&";
		});
		tool.postData('property-form',formdata,host+"properties/post_property.php");
	});
	}

	tool.getLocation(stored_region,host+'properties/regions.json');
			const elems = document.querySelectorAll(".region li");
		elems.forEach(function(ck){
			if(ck.getAttribute("data-value")==stored_region){
			ck.children[0].className="fa fa-check-square-o square";	
			 ck.setAttribute("data-status","checked");
			ck.classList.add("sec-lists-active");
			controlSelection(ck,elemsListParent);
			}
		});
		
		function controlSelection(child,parent){
			parent.insertBefore(child,parent.childNodes[0]);
			parent.scrollTop=0;
			}
			
			if(document.querySelector(".select-state")!=null){
			document.querySelector(".select-state").addEventListener("change",function(e){
		const val=e.target.value;
		tool.getData(val,host+'properties/regions.json');
	});	
			}
	

				 if(document.querySelector(".non-execute")!=null){
				document.querySelector(".non-execute").addEventListener("click",function(){
					alertMessage.innerHTML='Fill all required fields and upload some photos';
						alertMessageWrap.classList.add('alert-warning'); 
						alertMessageWrap.classList.remove('alert-success'); 
						alertMessageWrap.classList.add('show');
				setTimeout(function(){
				alertMessageWrap.classList.remove('show');
				alertMessageWrap.classList.add('hide');
				},5000)
				}); 
				 }
				 
				 const persistFiler = (elem,val)=>{
		elem.forEach(function(ck){
			filteredValues(ck.getAttribute("data-type"),val)
			if(ck.getAttribute("data-value")==val){
				 if(ck.getAttribute("data-type")=="property"){ 
					ck.click();
				 } 
				
			ck.children[0].className="fa fa-check-square-o square";	
			 ck.setAttribute("data-status","checked");
			ck.classList.add("sec-lists-active");
			
			}
		});
	}
	
	const persistFilerNumValues = (target,newValue)=>{
		if(newValue!==""){	
	setTimeout(function(){
	document.querySelector("."+target+"-filtered-value").click();
	},200);
	let sub=0;
	if(target=="room"){
		sub=1;
	}else{
		sub=document.querySelector(".price-range").value;
	}
	document.querySelector("."+target+"-values").setAttribute("data-value",formatNumber(newValue-sub));
	document.querySelector("."+target+"-values").value=formatNumber(newValue-sub);
			filteredValues(target,newValue);
	}
	}
	const selectedRegion=document.querySelector(".selected_region")!=null ? document.querySelector(".selected_region").innerHTML : '';
	const selectedLga=document.querySelector(".selected_lga")!=null ? document.querySelector(".selected_lga").innerHTML : '';
	const selectedTransaction=document.querySelector(".selected_transaction")!=null ? document.querySelector(".selected_transaction").innerHTML : '';
	const selectedProperty=document.querySelector(".selected_property_type")!=null ? document.querySelector(".selected_property_type").innerHTML : '';
	const selectedHouse=document.querySelector(".selected_house_type")!=null ? document.querySelector(".selected_house_type").innerHTML : '';
	const selectedPrice=document.querySelector(".selected_price")!=null ? document.querySelector(".selected_price").innerHTML : '';
	const selectedRoom=document.querySelector(".selected_room")!=null ? document.querySelector(".selected_room").innerHTML : '';
	//tool.getLocation(selectedRegion,host+'properties/regions.json');
	if(selectedTransaction!==""){
	document.querySelector(".tabs ."+selectedTransaction.toLowerCase()).click();
	}
	if(selectedRoom!==""){
	 filteredValues("calculate_room","get");	
	}
	if(selectedPrice!==""){
	 filteredValues("calculate_price","get");	
	}
	if(document.querySelector(".update-filter")!=null){
	const selectFilter = document.querySelector(".update-filter");
	selectFilter.addEventListener("click",function(){
	const regions = document.querySelectorAll(".region li");
	const lga = document.querySelectorAll(".towns li");
	const lists = document.querySelectorAll(".properties li");
	const house = document.querySelectorAll(".select-house-type li");
	setTimeout(function(){
	persistFiler(lists,selectedProperty);
	persistFiler(regions,selectedRegion);
	persistFiler(lga,selectedLga);
	persistFiler(house,selectedHouse);
	persistFilerNumValues("price",selectedPrice);
	persistFilerNumValues("room",selectedRoom);
	},500);
	 document.querySelector(".sec-adv-search").style="display:block";
	  document.querySelector(".filter-col ul").scrollTop=0;
	document.querySelectorAll(".filter-col ul").forEach(function(list){
	list.scrollTop=0;	
	});
 });
	}