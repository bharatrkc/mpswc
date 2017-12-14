<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" indent="yes" />
  <xsl:template match="/service_1"> 

	  <div class="container-fluid">

	  <xsl:variable name="active_tab" select="tab1"/>
 
	  <ul class="nav nav-tabs">
		<xsl:for-each select="//navbar/*"> 

			<xsl:variable name="tab_id" select="@id"/>


				<xsl:choose>
				  <xsl:when test="$tab_id='tab1'">
					<li class="li-tab active" id="li_{$tab_id}"><a href="#{$tab_id}"><xsl:apply-templates select="@Label"/></a>
					</li>
				  </xsl:when>
				  <xsl:otherwise>
					<li class="li-tab" id="li_{$tab_id}" data-toggle="popover" title="Have Patience!" data-content="Please fill the existing tab first"><a href="#{$tab_id}"><xsl:apply-templates select="@Label"/></a>
					</li>
				  </xsl:otherwise>
				</xsl:choose>  

		</xsl:for-each>
	  </ul>

	  <div class="clear-fix"></div>


	  <div class="tab-content">
	  <xsl:for-each select="tab"> 
		   
		   <xsl:variable name="tab_id" select="@id"/> 

		   <div id="{$tab_id}" class="tab-pane fade">  

			<div class="elements">
		    <xsl:for-each select="fields">
			
			  <xsl:for-each select="fieldsgroup"> 
			  
					<div class="clear-fix"></div>

					<xsl:variable name="group_id" select="@group_id"/>

					<div class="group-label text-bold" id="{$group_id}" ><xsl:value-of select="@label"/></div>
					 
					<table width="100%">
					<xsl:for-each select="row">
						<tr> 
						<xsl:for-each select="column">
							  
							<xsl:variable name="colspan" select="@colspan"/>
							<td valign="top" colspan="{$colspan}">
							
							 <xsl:for-each select="field">
								<xsl:variable name="type" select="@type"/>
								<xsl:variable name="name" select="@name"/> 
								<xsl:variable name="row" select="@row"/>
								<xsl:variable name="col" select="@col"/> 
								<xsl:variable name="placeholder" select="@placeholder"/>
								<xsl:variable name="maxlength" select="@maxlength"/>
								<xsl:variable name="pattern" select="@pattern"/>
								<xsl:variable name="title" select="@title"/>
								<xsl:variable name="min" select="@min"/>
								<xsl:variable name="max" select="@max"/>
								

								<xsl:if test="$pattern=''">
									<!-- <xsl:variable name="pattern" select="'*'"/> -->
								 </xsl:if> 


									<xsl:if test="@label != ''">
										<div class="element-label pull-left"><xsl:value-of select="@label" /></div>
									</xsl:if>


									<div class="element pull-left"> 
										 <xsl:choose>
											 <xsl:when test="$type='text'">	 
													
													 <xsl:choose>
														 <xsl:when test="@required='true'">	
															<input type="text" name="{$tab_id}[{$name}]" id="{$name}" placeholder="{$placeholder}" maxlength="{$maxlength}" title="{$title}" pattern="{$pattern}" required="required"  form="form_{$tab_id}" ng-model="{$tab_id}.{$name}"/> 

														 </xsl:when>
														 <xsl:otherwise>
															<input type="text" name="{$tab_id}[{$name}]" id="{$name}" placeholder="{$placeholder}" maxlength="{$maxlength}" title="{$title}" pattern="{$pattern}" form="form_{$tab_id}"  ng-model="{$tab_id}.{$name}"/> 


														 </xsl:otherwise>
													</xsl:choose>
											 </xsl:when>

											 <xsl:when test="$type='email'">
													 <xsl:choose>
														 <xsl:when test="@required='true'">	
															<input type="email" name="{$tab_id}[{$name}]" id="{$name}" maxlength="{$maxlength}" required="required" form="form_{$tab_id}"  ng-model="{$tab_id}.{$name}"/> 

														 </xsl:when>
														 <xsl:otherwise>
															<input type="email" name="{$tab_id}[{$name}]" id="{$name}" maxlength="{$maxlength}" form="form_{$tab_id}" ng-model="{$tab_id}.{$name}"/>

														 </xsl:otherwise>
													</xsl:choose>
											 </xsl:when>

											 <xsl:when test="$type='url'">
													 <xsl:choose>
														 <xsl:when test="@required='true'">	
															<input type="url" name="{$tab_id}[{$name}]" id="{$name}" maxlength="{$maxlength}" required="required" form="form_{$tab_id}"  ng-model="{$tab_id}.{$name}"/> 

														 </xsl:when>
														 <xsl:otherwise>
															<input type="url" name="{$tab_id}[{$name}]" id="{$name}" maxlength="{$maxlength}" form="form_{$tab_id}" ng-model="{$tab_id}.{$name}"/>

														 </xsl:otherwise>
													</xsl:choose>
											 </xsl:when>

											 <xsl:when test="$type='file'">	 						 
													<input type="file" name="{$tab_id}[{$name}]" id="{$name}" form="form_{$tab_id}" ng-model="{$tab_id}.{$name}"/> 
											 </xsl:when>

											 <xsl:when test="$type='date'">
													<xsl:choose>
														 <xsl:when test="@required='true'">	
															<input type="text" name="{$tab_id}[{$name}]" id="{$name}" min="{$min}" max="{$max}" required="required" form="form_{$tab_id}" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" placeholder="Date"  ng-model="{$tab_id}.{$name}"/>

														 </xsl:when>
														 <xsl:otherwise>
															<input type="text" name="{$tab_id}[{$name}]" id="{$name}"   min="{$min}" max="{$max}" form="form_{$tab_id}" placeholder="Date"  ng-model="{$tab_id}.{$name}"/> 
														 </xsl:otherwise>
													</xsl:choose> 
											 </xsl:when>

											 <xsl:when test="$type='radio'">	 
													<xsl:for-each select="option">
															<xsl:variable name="option" select="@value"/>
															<xsl:variable name="option_s" select="option"/>
															<xsl:choose>
																 <xsl:when test="@required='true'">	 
																	<label> <input type="radio" name="{$tab_id}[{$name}]" value="{$option}"   ng-model="{$tab_id}.{$name}"/>  <xsl:value-of select="node()" form="form_{$tab_id}"/></label>
																 </xsl:when>
																 <xsl:otherwise>
																	<label> <input type="radio" name="{$tab_id}[{$name}]" value="{$option}"  ng-model="{$tab_id}.{$name}"/>  <xsl:value-of select="node()" form="form_{$tab_id}"/></label>
																 </xsl:otherwise>
															</xsl:choose> 

														</xsl:for-each>

											 </xsl:when>
											 <xsl:when test="$type='textarea'">	 						 
													
													<xsl:choose>
														 <xsl:when test="@required='true'">
															<textarea rows="4" cols="50" name="{$tab_id}[{$name}]" id="{$name}"  maxlength="{$maxlength}" required="required" form="form_{$tab_id}"   ng-model="{$tab_id}.{$name}"></textarea>
														 </xsl:when>
														 <xsl:otherwise>
															<textarea rows="4" cols="50" name="{$tab_id}[{$name}]" id="{$name}"  maxlength="{$maxlength}" form="form_{$tab_id}" ng-model="{$tab_id}.{$name}"></textarea>
														 </xsl:otherwise>
													</xsl:choose> 

											 </xsl:when>
											 <xsl:when test="$type='select'"> 								 
													
													<xsl:choose>
														 <xsl:when test="@required='true'"> 

															<select name="{$tab_id}[{$name}]" id="{$name}" required="required" form="form_{$tab_id}"   ng-model="{$tab_id}.{$name}">
																<xsl:for-each select="option">
																	 <xsl:variable name="option" select="@value"/>
																	 <xsl:variable name="option_s" select="option"/>
																	 <option value="{$option}"> 
																		<xsl:value-of select="node()"/>
																	  </option>
																</xsl:for-each>
															</select>

														 </xsl:when>
														 <xsl:otherwise>

															<select name="{$tab_id}[{$name}]" id="{$name}" form="form_{$tab_id}" ng-model="{$tab_id}.{$name}">
																<xsl:for-each select="option">
																	 <xsl:variable name="option" select="@value"/>
																	 <xsl:variable name="option_s" select="option"/>
																	 <option value="{$option}"> 
																		<xsl:value-of select="node()"/>
																	  </option>
																</xsl:for-each>
															</select>

														 </xsl:otherwise>
													</xsl:choose> 
				  
													
											 </xsl:when>
										  </xsl:choose>
										   
										</div> 

										
									<xsl:if test="@newline = 'true'">
										<div class="newline"> </div>
									</xsl:if> 

							</xsl:for-each>
							</td>
						</xsl:for-each>

						</tr>
					</xsl:for-each>
					</table>
			  </xsl:for-each>

		  </xsl:for-each>
		  
		  </div>

		  </div>
	  </xsl:for-each>
	  </div>
 

	</div>
 
</xsl:template>
</xsl:stylesheet>