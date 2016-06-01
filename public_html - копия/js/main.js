
	
	$('input[name="Products[name]"]').keyup(function() { set_meta(); });
	
	function set_meta()
{ 
//	if(!meta_title_touched)
		$('input[name="Products[meta_title]"]').val(generate_meta_title());
//	if(!meta_keywords_touched)
		$('input[name="Products[meta_keywords]"]').val(generate_meta_keywords());
//if(!url_touched)
		$('input[name="Products[url]"]').val(generate_url());
//	if(!meta_description_touched)
		$('textarea[name="Products[meta_description]"]').val(generate_meta_description());

}

function generate_meta_title()
{
	name = $('input[name="Products[name]"]').val();
	return name;
}

function generate_meta_keywords()
{
	name = $('input[name="Products[name]"]').val();
	result = name;
	brand = $('select[name="Products[brand_id]"] option:selected').text();//.attr('brand_name');
	if(typeof(brand) == 'string' && brand!='')
			result += ', '+brand;
	$('select[name="categories[]"]').each(function(index) {
		c = $(this).find('option:selected').attr('category_name');
		if(typeof(c) == 'string' && c != '')
    		result += ', '+c;
	}); 
	return result;
}

function generate_meta_description()
{
	/*if(typeof(tinyMCE.get("Products[annotation]")) =='object')
	{
		console.log(tinyMCE.get("Products[annotation]").getContent());
		description = tinyMCE.get("annotation").getContent().replace(/(<([^>]+)>)/ig," ").replace(/(\&nbsp;)/ig," ").replace(/^\s+|\s+$/g, '').substr(0, 512);
		return description;
	}
	else*/
	
	if($('textarea[name="Products[annotation]"]').val()==''){
			name = $('input[name="Products[name]"]').val();
			return name;
	}else{
		return $('textarea[name="Products[annotation]"]').val().replace(/(<([^>]+)>)/ig," ").replace(/(\&nbsp;)/ig," ").replace(/^\s+|\s+$/g, '').substr(0, 512);		
	}
		
	//	console.log( $('textarea[name="Products[annotation]"]').val().replace(/(<([^>]+)>)/ig," ").replace(/(\&nbsp;)/ig," ").replace(/^\s+|\s+$/g, '').substr(0, 512));
}


function generate_url()
{
	url = $('input[name="Products[name]"]').val();
	url = url.replace(/[\s]+/gi, '-');
	url = translit(url);
	url = url.replace(/[^0-9a-z_\-]+/gi, '').toLowerCase();	
	return url;
}

function translit(str)
{
	var ru=("А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я").split("-")   
	var en=("A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya").split("-")   
 	var res = '';
	for(var i=0, l=str.length; i<l; i++)
	{ 
		var s = str.charAt(i), n = ru.indexOf(s); 
		if(n >= 0) { res += en[n]; } 
		else { res += s; } 
    } 
    return res;  
}