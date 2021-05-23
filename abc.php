<?php 



                               function munci() {
                                
                                $con=mysqli_connect("localhost","root","","aleppyco_hospitals");
                                $res=mysqli_query($con,"select id,name from munci order by name");
								//foreach($res as $listitem){
                                    //echo "<option value='".$listitem['id']."'>".$listitem['mname']."</option>";
                                    echo $res['mname'];
                                //}
								} 
                              
                               
                               function pancyat()
                               {
                                  
                                $con=mysqli_connect("localhost","root","","aleppyco_hospitals");
                                $res=mysqli_query($con,"select id,name from munci order by name");
                                foreach($res as $listitem){
                                    echo "<option value='".$listitem['id']."'>".$listitem['name']."</option>";
                                }
                               }

                               function subdiv()
                               {
                                   
                                $con=mysqli_connect("localhost","root","","aleppyco_hospitals");
                                $res=mysqli_query($con,"select id,name from munci order by name");
                                foreach($res as $listitem){
                                    echo "<option value='".$listitem['id']."'>".$listitem['name']."</option>";
                                }
                               }
                               munci();
                               
							?>
