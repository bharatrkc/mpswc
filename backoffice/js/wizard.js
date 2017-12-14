$(document).ready(function(){
	
	 $("#submitForm").click(function () {
		 var valid = true;
		 var focused = false;
    	 $("#wizardForm *[required='true']").each(function(){
    		 var name = $(this).attr('name');
        	 var attrValue;
        	 if($(this).is('select')){
        		 attrValue = $("[name='"+name+"']").val();
    		 }else{
    			 attrValue = $("[name='"+name+"']:checked").val();
    		 }
        	 if( typeof attrValue == 'undefined' || attrValue=="" || attrValue==null){
        		 if($(this).is('select')){
        			 $(this).addClass("error");
        			 valid = false;
        		 }else{
        			 $(this).closest("span").find("label").addClass("error");
        			 valid = false;
        		 }
        		 if(!focused){
        			$(this).focus();        			
        			focused=true;
        		 }
        	 }        	 
         });
    	 if(valid){
    		$("#wizardForm").submit(); 
    	 }else{
    		 alert("Please fill mandatory fields");
    	 }
         
     });
	 var validateFields = function(){
    	 var name = $(this).attr('name');
    	 var attrValue = $("[name='"+name+"']").val();
    	 var valid = true;
    	 if( typeof attrValue == 'undefined' || attrValue=="" || attrValue==null){
    		 if($(this).is('select')){
    			 $(this).addClass("error");
    			 valid = false;
    		 }else{
    			 $(this).closest("span").find("label").addClass("error");
    			 valid = false;
    		 }    		 
    	 }else{
    		 if($(this).is('select')){
    			 $(this).removeClass("error");
    		 }else{
    			 $(this).closest("span").find("label").removeClass("error");
    		 } 
    	 }
    	 return valid;
     }
	 
	 $("#wizardForm *[required='true']").change(validateFields);
	 
	String.prototype.getNumericArray = function() {
		arr = this.split(',');
		return arr.map(function(value){
			if($.isNumeric(value)){
				return value;
			}		 
		}).filter(x => !isNaN(x)); 
	};
	String.prototype.mergeNumericArray = function(str) {
		var arr1 = this.getNumericArray();
		var arr2 = str.getNumericArray();
		for(var i=0; i<arr2.length; ++i) {			
			if($.inArray( arr2[i], arr1)==-1)arr1.push(arr2[i]);
		}		
		return arr1;		
	};
	
	String.prototype.mergeWithArray = function(numArray) {
		var arr2 = this.getNumericArray();
		for(var i=0; i<arr2.length; ++i) {			
			if($.inArray( arr2[i], numArray)==-1)numArray.push(arr2[i]);
		}		
		return numArray;		
	};
	
	var mergeArray = function(array1, array2){
		for(var i=0; i<array2.length; ++i) {			
			if($.inArray( array2[i], array1)==-1)array1.push(array2[i]);
		}		
		return array1;
	}
	$('#wizardForm *[data-parentid]').each(function(){
		var parentId = $(this).attr('data-parentid');
		var id = $(this).attr('id');
		var ele = $(this).clone();
		$(ele).attr('id',id+"_clone");
		$(ele).appendTo("#cascadingCombos");
		$(this).find('option:not([value=""])').remove(); 
		$("#"+parentId).change(function(){
			var parentValue = $(this).val();
			$("#"+id).find('option:not([value=""])').remove(); 
			$("#"+id+"_clone option[data-parentansid='"+parentValue+"']").clone().appendTo("#"+id);
			$("#"+id+"_clone option[data-parentansid='-1']").clone().appendTo("#"+id);
		});
	});
	$("#27").attr("style","height:200px");
	var hideShowFunction = function(){
		var array1;
		if($(this).attr('id').indexOf("_")>0){
			array1 = arrayOfHideShowElements[$(this).attr('name')+"_"];
		}else{
			array1 = arrayOfHideShowElements[$(this).attr('id')];
		}
		for(var i=0; i<array1.length; ++i){
			if($("[name='wizardForm["+array1[i]+"]']").length > 1){
				$("[name='wizardForm["+array1[i]+"]']").attr("disabled","diabled");
				$("[name='wizardForm["+array1[i]+"]']").removeAttr("required");
				$("[name='wizardForm["+array1[i]+"]']").closest("*.hideshow").hide();
				$("[name='wizardForm["+array1[i]+"]']").attr("checked","false");
				$("[name='wizardForm["+array1[i]+"]']").trigger("change");
			}else{
				$("#"+array1[i]).attr("disabled","diabled");
				$("#"+array1[i]).removeAttr("required");
				$("#"+array1[i]).closest("*.hideshow").hide();
				$("#"+array1[i]).val("");
				$("#"+array1[i]).trigger("change");
			}			
		}
		var elementToHide;
		if($(this).is('select')){
			elementToHide = $(this).find("option[value='"+$(this).val()+"']").attr('data-dependentquestions');
			
		}else{
			elementToHide =  $(this).attr('data-dependentquestions');
		}
		if(typeof elementToHide != 'undefined' && elementToHide!="" ){
			var array2 = elementToHide.getNumericArray();
			for(var i=0; i<array2.length; ++i){
				if($("[name='wizardForm["+array2[i]+"]']").length > 1){
					$("[name='wizardForm["+array2[i]+"]']").removeAttr("disabled");
					$("[name='wizardForm["+array2[i]+"]']").attr("required","true");
					$("[name='wizardForm["+array2[i]+"]']").closest("*.hideshow").show();
				}else{
					$("#"+array2[i]).removeAttr("disabled");
					$("#"+array2[i]).attr("required","true");
					$("#"+array2[i]).closest("*.hideshow").show();
				}
			}
		}
	}
	
	 var arrayOfHideShowElements = new Object();
		$("#wizardForm *[data-dependentquestions]").each(function(){
			if($(this).is('option')){
				var parent = $(this).parent();
				var parentId = $(parent).attr("id");
				var dependentFieldsArray = $(this).attr('data-dependentquestions').getNumericArray();
				if(typeof arrayOfHideShowElements[parentId] != 'undefined' && arrayOfHideShowElements[parentId]!=null){
					arrayOfHideShowElements[parentId] = mergeArray(arrayOfHideShowElements[parentId],dependentFieldsArray);
				}else{
					arrayOfHideShowElements[parentId] = dependentFieldsArray;
				}
			}else{
				var name = $(this).attr("name");
				var arrayOfInput = {};
				$('#wizardForm input[name="'+name+'"][data-dependentquestions]').each(function(){
					if(arrayOfInput.length>0){
						$(this).attr('data-dependentquestions').mergeWithArray(arrayOfInput);
					}else{
						arrayOfInput = $(this).attr('data-dependentquestions').getNumericArray();
					}
				});
				arrayOfHideShowElements[$(this).attr('name')+"_"] = arrayOfInput; 
			}			
		});
		$.each(arrayOfHideShowElements, function( key, value ) {
			if(key.indexOf("_") > -1){
				$("[name='"+key.substring(0, key.indexOf("_"))+"']").change(hideShowFunction);
			}else{
				$("#"+key).change(hideShowFunction);
			}
			for(var i=0; i<value.length; ++i){
				if($("[name='wizardForm["+value[i]+"]']").length > 1){
					$("[name='wizardForm["+value[i]+"]']").attr("disabled","diabled");
					$("[name='wizardForm["+value[i]+"]']").removeAttr("required");
					$("[name='wizardForm["+value[i]+"]']").closest("*.hideshow").hide();
					$("[name='wizardForm["+value[i]+"]']").attr("checked","false");
					$("[name='wizardForm["+value[i]+"]']").trigger("change");
				}else{
					$("#"+value[i]).attr("disabled","diabled");
					$("#"+value[i]).removeAttr("required");
					$("#"+value[i]).closest("*.hideshow").hide();
					$("#"+value[i]).val("");
					$("#"+value[i]).trigger("change");
				}
				
				
			}
		});
	
});