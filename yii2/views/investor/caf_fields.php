<div id="tab1" class="tab-pane fade active in"><div class="elements">
<div class="clear-fix"></div>
<div class="group-label text-bold" id="tab1-fieldsgroup-1">Organization Details</div>
<table width="100%">
<tbody><tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Unit Name</div>
<div class="element pull-left"><input type="text" name="tab1[unit_name]" id="unit_name" placeholder="" maxlength="" title="" pattern="^[A-Za-z -]+$" required="required" form="form_tab1" ng-model="tab1.unit_name"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Constitution</div>
<div class="element pull-left"><select name="tab1[constitution]" id="constitution" required="required" form="form_tab1" ng-model="tab1.constitution"><option value="">Select</option>
<option value="Proprietary">Proprietary</option>
<option value="Partnership">Partnership</option>
<option value="Public Ltd. Company">Public Ltd. Company</option>
<option value="Private Ltd. Company">Private Ltd. Company</option>
<option value="Cooperatives">Cooperatives</option>
<option value="Self Help Group">Self Help Group</option>
<option value="Limited Liability Partnership">Limited Liability Partnership</option></select></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Registration No (Udhyog Aadhar, IEM/EOU/IL/DIC/SIA)</div>
<div class="element pull-left"><input type="text" name="tab1[registration_no]" id="registration_no" placeholder="" maxlength="" title="" pattern="^[a-zA-Z][a-zA-Z0-9\s]*$" required="required" form="form_tab1" ng-model="tab1.registration_no"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Registration Date</div>
<div class="element pull-left"><input type="text" name="tab1[registration_date]" id="registration_date" min="1960-01-02" max="2017-01-01" required="required" form="form_tab1" onfocus="(this.type='date')" onblur="if(this.value=='')false" placeholder="Date" ng-model="tab1.registration_date"></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">URL of Company Website</div>
<div class="element pull-left"><input type="url" name="tab1[company_website]" id="company_website" maxlength="" form="form_tab1" ng-model="tab1.company_website"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">PAN No.</div>
<div class="element pull-left"><input type="text" name="tab1[pan_number]" id="pan_number" placeholder="" maxlength="25" title="Invalid Pan Number" pattern="[\w]{3}(p|P|c|C|h|H|f|F|a|A|t|T|b|B|l|L|j|J|g|G)[\w][\d]{4}[\w]" required="required" form="form_tab1" ng-model="tab1.pan_number"></div>
</td>
</tr>
</tbody></table>
<div class="clear-fix"></div>
<div class="group-label text-bold" id="tab1-fieldsgroup-2">Contact Details</div>
<table width="100%">
<tbody><tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Name</div>
<div class="element pull-left"><input type="text" name="tab1[contact_name]" id="contact_name" placeholder="" maxlength="" title="Letters only" pattern="^[A-Za-z -]+$" required="required" form="form_tab1" ng-model="tab1.contact_name"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Designation</div>
<div class="element pull-left"><input type="text" name="tab1[contact_designation]" id="contact_designation" placeholder="" maxlength="" title="Letters only" pattern="^[A-Za-z -]+$" required="required" form="form_tab1" ng-model="tab1.contact_designation"></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Mobile number</div>
<div class="element pull-left"><input type="text" name="tab1[contact_mobile]" id="contact_mobile" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.contact_mobile"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Email</div>
<div class="element pull-left"><input type="email" name="tab1[contact_email]" id="contact_email" maxlength="30" required="required" form="form_tab1" ng-model="tab1.contact_email"></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Phone No.</div>
<div class="element pull-left"><input type="text" name="tab1[contact_phone_no]" id="contact_phone_no" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.contact_phone_no"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Fax No.</div>
<div class="element pull-left"><input type="text" name="tab1[contact_fax_no]" id="contact_fax_no" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.contact_fax_no"></div>
</td>
</tr>
</tbody></table>
<div class="clear-fix"></div>
<div class="group-label text-bold" id="tab1-fieldsgroup-3">Manager Details</div>
<table width="100%">
<tbody><tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Name</div>
<div class="element pull-left"><input type="text" name="tab1[manager_name]" id="manager_name" placeholder="" maxlength="" title="Letters only" pattern="^[A-Za-z -]+$" required="required" form="form_tab1" ng-model="tab1.manager_name"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">S/o.D/o.W/o</div>
<div class="element pull-left"><input type="text" name="tab1[manager_s_d_w_o]" id="manager_s_d_w_o" placeholder="" maxlength="" title="Letters only" pattern="^[A-Za-z -]+$" required="required" form="form_tab1" ng-model="tab1.manager_s_d_w_o"></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Address (Add. , State, District, Pincode)</div>
<div class="element pull-left"><textarea rows="4" cols="50" name="tab1[manager_address]" id="manager_address" maxlength="25" required="required" form="form_tab1" ng-model="tab1.manager_address"></textarea></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Mobile number</div>
<div class="element pull-left"><input type="text" name="tab1[manager_mobile]" id="manager_mobile" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.manager_mobile"></div>
</td>
</tr>
<tr><td valign="top" colspan="">
<div class="element-label pull-left">Email</div>
<div class="element pull-left"><input type="email" name="tab1[manager_email]" id="manager_email" maxlength="30" required="required" form="form_tab1" ng-model="tab1.manager_email"></div>
</td></tr>
</tbody></table>
<div class="clear-fix"></div>
<div class="group-label text-bold" id="tab1-fieldsgroup-4">Applicant Details</div>
<table width="100%">
<tbody><tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Name</div>
<div class="element pull-left"><input type="text" name="tab1[applicant_name]" id="applicant_name" placeholder="" maxlength="" title="Letters only" pattern="^[A-Za-z -]+$" required="required" form="form_tab1" ng-model="tab1.applicant_name"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">S/o.D/o.W/o</div>
<div class="element pull-left"><input type="text" name="tab1[applicant_s_d_w_o]" id="applicant_s_d_w_o" placeholder="" maxlength="" title="Letters only" pattern="^[A-Za-z -]+$" required="required" form="form_tab1" ng-model="tab1.applicant_s_d_w_o"></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Date of Birth (DD/MM/YYYY)</div>
<div class="element pull-left"><input type="text" name="tab1[applicant_dob]" id="applicant_dob" min="1960-01-02" max="2017-01-01" required="required" form="form_tab1" onfocus="(this.type='date')" onblur="if(this.value=='')false" placeholder="Date" ng-model="tab1.applicant_dob"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Designation</div>
<div class="element pull-left"><input type="text" name="tab1[applicant_designation]" id="applicant_designation" placeholder="" maxlength="" title="Letters only" pattern="^[A-Za-z -]+$" required="required" form="form_tab1" ng-model="tab1.applicant_designation"></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Aadhar No</div>
<div class="element pull-left"><input type="text" name="tab1[applicant_aadhar_no]" id="applicant_aadhar_no" placeholder="" maxlength="12" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.applicant_aadhar_no"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Mobile number</div>
<div class="element pull-left"><input type="text" name="tab1[applicant_mobile]" id="applicant_mobile" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.applicant_mobile"></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Email</div>
<div class="element pull-left"><input type="email" name="tab1[applicant_email]" id="applicant_email" maxlength="30" required="required" form="form_tab1" ng-model="tab1.applicant_email"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Phone No.</div>
<div class="element pull-left"><input type="text" name="tab1[applicant_phone_no]" id="applicant_phone_no" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.applicant_phone_no"></div>
</td>
</tr>
<tr><td valign="top" colspan="">
<div class="element-label pull-left">Fax No.</div>
<div class="element pull-left"><input type="text" name="tab1[applicant_fax_no]" id="applicant_fax_no" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.applicant_fax_no"></div>
</td></tr>
</tbody></table>
<div class="clear-fix"></div>
<div class="group-label text-bold" id="tab1-fieldsgroup-5">Correspondence Address</div>
<table width="100%">
<tbody><tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Address Line 1</div>
<div class="element pull-left"><input type="text" name="tab1[correspondence_address_line1]" id="correspondence_address_line1" placeholder="" maxlength="" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.correspondence_address_line1"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Address Line 2</div>
<div class="element pull-left"><input type="text" name="tab1[correspondence_address_line2]" id="correspondence_address_line2" placeholder="" maxlength="" title="" pattern=".*" form="form_tab1" ng-model="tab1.correspondence_address_line2"></div>
</td>
</tr>
<tr><td valign="top" colspan="">
<div class="element-label pull-left">District</div>
<div class="element pull-left"><input type="text" name="tab1[correspondence_address_district]" id="correspondence_address_district" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.correspondence_address_district"></div>
</td></tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">State</div>
<div class="element pull-left"><select name="tab1[correspondence_address_state]" id="correspondence_address_state" required="required" form="form_tab1" ng-model="tab1.correspondence_address_state"><option value="">Select</option>
<option value="R">Registered</option>
<option value="C">Corporate</option>
<option value="K">Correspondence</option></select></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Country</div>
<div class="element pull-left"><select name="tab1[correspondence_address_country]" id="correspondence_address_country" required="required" form="form_tab1" ng-model="tab1.correspondence_address_country"><option value="">Select</option>
<option value="R">Registered</option>
<option value="C">Corporate</option>
<option value="K">Correspondence</option></select></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Pincode</div>
<div class="element pull-left"><input type="text" name="tab1[correspondence_address_pincode]" id="correspondence_address_pincode" placeholder="" maxlength="6" title="Invalid Pincode" pattern="^[1-9][0-9]{5}$" required="required" form="form_tab1" ng-model="tab1.correspondence_address_pincode"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Mobile number</div>
<div class="element pull-left"><input type="text" name="tab1[correspondence_address_mobile]" id="correspondence_address_mobile" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.correspondence_address_mobile"></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Email</div>
<div class="element pull-left"><input type="email" name="tab1[correspondence_address_email]" id="correspondence_address_email" maxlength="30" required="required" form="form_tab1" ng-model="tab1.correspondence_address_email"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Phone No.</div>
<div class="element pull-left"><input type="text" name="tab1[correspondence_address_phone_no]" id="correspondence_address_phone_no" placeholder="" maxlength="25" title="" pattern=".*" form="form_tab1" ng-model="tab1.correspondence_address_phone_no"></div>
</td>
</tr>
<tr><td valign="top" colspan="">
<div class="element-label pull-left">Fax No.</div>
<div class="element pull-left"><input type="text" name="tab1[correspondence_address_fax_no]" id="correspondence_address_fax_no" placeholder="" maxlength="25" title="" pattern=".*" form="form_tab1" ng-model="tab1.correspondence_address_fax_no"></div>
</td></tr>
</tbody></table>
<div class="clear-fix"></div>
<div class="group-label text-bold" id="tab1-fieldsgroup-6">Registered Office Address</div>
<table width="100%">
<tbody><tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Address Line 1</div>
<div class="element pull-left"><input type="text" name="tab1[registered_office_address_line1]" id="registered_office_address_line1" placeholder="" maxlength="" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.registered_office_address_line1"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Address Line 2</div>
<div class="element pull-left"><input type="text" name="tab1[registered_office_address_line2]" id="registered_office_address_line2" placeholder="" maxlength="" title="" pattern=".*" form="form_tab1" ng-model="tab1.registered_office_address_line2"></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">District</div>
<div class="element pull-left"><input type="text" name="tab1[registered_office_address_district]" id="registered_office_address_district" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.registered_office_address_district"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">State</div>
<div class="element pull-left"><select name="tab1[registered_office_address_state]" id="registered_office_address_state" required="required" form="form_tab1" ng-model="tab1.registered_office_address_state"><option value="">Select</option>
<option value="R">Registered</option>
<option value="C">Corporate</option>
<option value="K">Correspondence</option></select></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Country</div>
<div class="element pull-left"><select name="tab1[registered_office_address_country]" id="registered_office_address_country" required="required" form="form_tab1" ng-model="tab1.registered_office_address_country"><option value="">Select</option>
<option value="R">Registered</option>
<option value="C">Corporate</option>
<option value="K">Correspondence</option></select></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Pincode</div>
<div class="element pull-left"><input type="text" name="tab1[registered_office_address_pincode]" id="registered_office_address_pincode" placeholder="" maxlength="6" title="Invalid Pincode" pattern="^[1-9][0-9]{5}$" required="required" form="form_tab1" ng-model="tab1.registered_office_address_pincode"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Fax No.</div>
<div class="element pull-left"><input type="text" name="tab1[registered_office_address_fax_no]" id="registered_office_address_fax_no" placeholder="" maxlength="25" title="" pattern=".*" form="form_tab1" ng-model="tab1.registered_office_address_fax_no"></div>
</td>
</tr>
</tbody></table>
<div class="clear-fix"></div>
<div class="group-label text-bold" id="tab1-fieldsgroup-7">D. Project Information</div>
<table width="100%">
<tbody><tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Project Name</div>
<div class="element pull-left"><input type="text" name="tab1[project_name]" id="project_name" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.project_name"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Category (Manufacturing / Services)</div>
<div class="element pull-left"><select name="tab1[category]" id="category" required="required" form="form_tab1" ng-model="tab1.category"><option value="">Select</option>
<option value="yes">Yes</option>
<option value="no">No</option></select></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Sector</div>
<div class="element pull-left"><select name="tab1[sector]" id="sector" required="required" form="form_tab1" ng-model="tab1.sector"><option value="">Select</option>
<option value="yes">Yes</option>
<option value="no">No</option></select></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Line of Activity</div>
<div class="element pull-left"><select name="tab1[line_of_activity]" id="line_of_activity" required="required" form="form_tab1" ng-model="tab1.line_of_activity"><option value="">Select</option>
<option value="yes">Yes</option>
<option value="no">No</option></select></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Pollution Category</div>
<div class="element pull-left"><select name="tab1[pollution_category]" id="pollution_category" required="required" form="form_tab1" ng-model="tab1.pollution_category"><option value="">Select</option>
<option value="yes">Yes</option>
<option value="no">No</option></select></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Project is New or an Expansion</div>
<div class="element pull-left"><select name="tab1[project_new_or_expansion]" id="project_new_or_expansion" required="required" form="form_tab1" ng-model="tab1.project_new_or_expansion"><option value="">Select</option>
<option value="yes">Yes</option>
<option value="no">No</option></select></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Proposed Production Date</div>
<div class="element pull-left"><input type="text" name="tab1[proposed_production_date]" id="proposed_production_date" min="1960-01-02" max="2017-01-01" required="required" form="form_tab1" onfocus="(this.type='date')" onblur="if(this.value=='')false" placeholder="Date" ng-model="tab1.proposed_production_date"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Women Entrepreneur</div>
<div class="element pull-left"><select name="tab1[women_entrepreneur]" id="women_entrepreneur" required="required" form="form_tab1" ng-model="tab1.women_entrepreneur"><option value="">Select</option>
<option value="yes">Yes</option>
<option value="no">No</option></select></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Differently Abled</div>
<div class="element pull-left"><select name="tab1[differently_abled]" id="differently_abled" required="required" form="form_tab1" ng-model="tab1.differently_abled"><option value="">Select</option>
<option value="yes">Yes</option>
<option value="no">No</option></select></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Minority</div>
<div class="element pull-left"><select name="tab1[minority]" id="minority" required="required" form="form_tab1" ng-model="tab1.minority"><option value="">Select</option>
<option value="yes">Yes</option>
<option value="no">No</option></select></div>
</td>
</tr>
</tbody></table>
<div class="clear-fix"></div>
<div class="group-label text-bold" id="tab1-fieldsgroup-8">Direct</div>
<table width="100%"><tbody><tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Male</div>
<div class="element pull-left"><input type="text" name="tab1[direct_male]" id="direct_male" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.direct_male"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Female</div>
<div class="element pull-left"><input type="text" name="tab1[direct_female]" id="direct_female" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.direct_female"></div>
</td>
</tr></tbody></table>
<div class="clear-fix"></div>
<div class="group-label text-bold" id="tab5-fieldsgroup-2">Indirect</div>
<table width="100%"><tbody><tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Male</div>
<div class="element pull-left"><input type="text" name="tab1[indirect_male]" id="indirect_male" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.indirect_male"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Female</div>
<div class="element pull-left"><input type="text" name="tab1[indirect_female]" id="indirect_female" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.indirect_female"></div>
</td>
</tr></tbody></table>
<div class="clear-fix"></div>
<div class="group-label text-bold" id="tab1-fieldsgroup-9"></div>
<table width="100%">
<tbody><tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Value of Land (in Lakhs)</div>
<div class="element pull-left"><input type="text" name="tab1[value_of_land]" id="value_of_land" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.value_of_land"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Value of Building(in Lakhs)</div>
<div class="element pull-left"><input type="text" name="tab1[value_of_building]" id="value_of_building" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.value_of_building"></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Value of Plant and Machinery / Service Equipment (In Lakhs)</div>
<div class="element pull-left"><input type="text" name="tab1[value_of_plant_and_machinery]" id="value_of_plant_and_machinery" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.value_of_plant_and_machinery"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Total Project Value</div>
<div class="element pull-left"><input type="text" name="tab1[total_project_value]" id="total_project_value" placeholder="" maxlength="" title="" pattern="[0-9]" form="form_tab1" ng-model="tab1.total_project_value"></div>
</td>
</tr>
<tr><td valign="top" colspan="">
<div class="element-label pull-left">Industry Type (Micro/ Small/ Medium/ Large/ Mega)</div>
<div class="element pull-left"><input type="text" name="tab1[industry_type]" id="industry_type" placeholder="" maxlength="" title="" pattern="[0-9]" form="form_tab1" ng-model="tab1.industry_type"></div>
</td></tr>
</tbody></table>
<div class="clear-fix"></div>
<div class="group-label text-bold" id="tab1-fieldsgroup-10"></div>
<table width="100%">
<tbody><tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Type of Land (AKVN / DTIC / Private / Government)</div>
<div class="element pull-left"><input type="text" name="tab1[type_of_land]" id="type_of_land" placeholder="" maxlength="" title="" pattern="[0-9]" form="form_tab1" ng-model="tab1.type_of_land"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Name of Industrial Area / SEZ</div>
<div class="element pull-left"><input type="text" name="tab1[name_of_industrial_area]" id="name_of_industrial_area" placeholder="" maxlength="" title="" pattern="[0-9]" form="form_tab1" ng-model="tab1.name_of_industrial_area"></div>
</td>
</tr>
<tr><td valign="top" colspan="">
<div class="element-label pull-left">Land Use Type</div>
<div class="element pull-left"><input type="text" name="tab1[land_use_type]" id="land_use_type" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.land_use_type"></div>
</td></tr>
</tbody></table>
<div class="clear-fix"></div>
<div class="group-label text-bold" id="tab1-fieldsgroup-11">Proposed Site/ Factory Location</div>
<table width="100%">
<tbody><tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Plot Number</div>
<div class="element pull-left"><input type="text" name="tab1[plot_number]" id="plot_number" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.plot_number"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Address Line 1</div>
<div class="element pull-left"><input type="text" name="tab1[proposed_site_address_line1]" id="proposed_site_address_line1" placeholder="" maxlength="" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.proposed_site_address_line1"></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">District</div>
<div class="element pull-left"><input type="text" name="tab1[proposed_site_district]" id="proposed_site_district" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.proposed_site_district"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Tehsil</div>
<div class="element pull-left"><input type="text" name="tab1[proposed_site_tehsil]" id="proposed_site_tehsil" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.proposed_site_tehsil"></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Village / Area</div>
<div class="element pull-left"><input type="text" name="tab1[proposed_site_area]" id="proposed_site_area" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.proposed_site_area"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Pincode</div>
<div class="element pull-left"><input type="text" name="tab1[proposed_site_pincode]" id="proposed_site_pincode" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.proposed_site_pincode"></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Telephone</div>
<div class="element pull-left"><input type="text" name="tab1[proposed_site_telephone]" id="proposed_site_telephone" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.proposed_site_telephone"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Total Extent of Site Area in Sq. mts</div>
<div class="element pull-left"><input type="text" name="tab1[proposed_site_total_extend_of_site_area]" id="proposed_site_total_extend_of_site_area" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.proposed_site_total_extend_of_site_area"></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Proposed Area for Development(in Sq. mts)</div>
<div class="element pull-left"><input type="text" name="tab1[proposed_site_area_for_development]" id="proposed_site_area_for_development" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.proposed_site_area_for_development"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Total Built up Area(in Sq. mts)</div>
<div class="element pull-left"><input type="text" name="tab1[proposed_site_total_built_area]" id="proposed_site_total_built_area" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.proposed_site_total_built_area"></div>
</td>
</tr>
<tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Height of the Building(In mts)</div>
<div class="element pull-left"><input type="text" name="tab1[proposed_site_height_of_building]" id="proposed_site_height_of_building" placeholder="" maxlength="25" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.proposed_site_height_of_building"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Building Plan Approval (New / Amendment)</div>
<div class="element pull-left"><input type="text" name="tab1[proposed_site_building_plan]" id="proposed_site_building_plan" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.proposed_site_building_plan"></div>
</td>
</tr>
</tbody></table>
<div class="clear-fix"></div>
<div class="group-label text-bold" id="tab1-fieldsgroup-12">Line of Manufacture</div>
<table width="100%">
<tbody><tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Product Name</div>
<div class="element pull-left"><input type="text" name="tab1[line_manufacture_product_name]" id="line_manufacture_product_name" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.line_manufacture_product_name"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Quantity (Per Annum)</div>
<div class="element pull-left"><input type="text" name="tab1[line_manufacture_quantity]" id="line_manufacture_quantity" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.line_manufacture_quantity"></div>
</td>
</tr>
<tr><td valign="top" colspan="">
<div class="element-label pull-left">Unit</div>
<div class="element pull-left"><input type="text" name="tab1[line_manufacture_unit]" id="line_manufacture_unit" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.line_manufacture_unit"></div>
</td></tr>
</tbody></table>
<div class="clear-fix"></div>
<div class="group-label text-bold" id="tab1-fieldsgroup-13">Raw Materials Used in Process</div>
<table width="100%">
<tbody><tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Item</div>
<div class="element pull-left"><input type="text" name="tab1[raw_materials_item]" id="raw_materials_item" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.raw_materials_item"></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Quantity (Per Annum)</div>
<div class="element pull-left"><input type="text" name="tab1[raw_materials_quantity]" id="raw_materials_quantity" placeholder="" maxlength="" title="" pattern=".*" required="required" form="form_tab1" ng-model="tab1.raw_materials_quantity"></div>
</td>
</tr>
<tr><td valign="top" colspan="">
<div class="element-label pull-left">Unit</div>
<div class="element pull-left"><input type="text" name="tab1[raw_materials_unit]" id="raw_materials_unit" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.raw_materials_unit"></div>
</td></tr>
</tbody></table>
<div class="clear-fix"></div>
<div class="group-label text-bold" id="tab1-fieldsgroup-14"></div>
<table width="100%"><tbody><tr>
<td valign="top" colspan="">
<div class="element-label pull-left">Production Capacity </div>
<div class="element pull-left"><input type="text" name="tab1[production_capacity ]" id="production_capacity " placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.production_capacity "></div>
</td>
<td valign="top" colspan="">
<div class="element-label pull-left">Unit</div>
<div class="element pull-left"><input type="text" name="tab1[production_capacity_unit]" id="production_capacity_unit" placeholder="" maxlength="" title="" pattern="[0-9]" required="required" form="form_tab1" ng-model="tab1.production_capacity_unit"></div>
</td>
</tr></tbody></table>
</div></div>