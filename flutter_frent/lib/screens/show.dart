import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:tasareeh/api_service.dart';
import 'package:tasareeh/common/theme_helper.dart';
import 'package:tasareeh/home.dart';
import 'package:tasareeh/model/contrie.dart';
import 'package:tasareeh/model/success.dart';
import 'package:intl/intl.dart' as inl;
import 'package:tasareeh/screens/book.dart';

import '../model/Demande.dart';


class showContent extends StatefulWidget{
  final Demande paramValue;
  const showContent({Key? key, required this.paramValue}): super(key:key);

  @override
  _showContentState createState() => _showContentState();
}



class _showContentState extends State<showContent>{
  Color _primaryColor = Color.fromARGB(220,84,254,1000);
  Color _accentColor = Color.fromARGB(138,2,174,1000);


  final GlobalKey<State> _statefulBuilderKey = GlobalKey<State>();

  @override
  Widget build(BuildContext context) {
    return Directionality(
        textDirection: TextDirection.rtl,
        child:Scaffold(
            appBar:AppBar(
              title: Center(child: Text(widget.paramValue.cOMPID.toString()+'/'+widget.paramValue.cERTYPE.toString())),
              shape: RoundedRectangleBorder(
                borderRadius: BorderRadius.vertical(
                  bottom: Radius.circular(40.0),
                ),
              ),
              leading: IconButton(
                icon: Icon(Icons.arrow_back, color: Colors.black),
                onPressed: () => Navigator.of(context).pushAndRemoveUntil(
                    MaterialPageRoute(builder: (context) => BookContent()),
                        (route) => false),
              ),
              flexibleSpace: Container(
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.only(
                    bottomLeft: Radius.circular(40.0),
                    bottomRight: Radius.circular(40.0),
                  ),
                  gradient: LinearGradient(
                    colors: [_primaryColor, _accentColor], // Start and end colors
                    begin: Alignment.centerLeft,
                    end: Alignment.centerRight,
                  ),
                ),
              ),
            ),

            body:SingleChildScrollView( // Wrap your content with SingleChildScrollView
                child:  Center(
                  child: Column(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: <Widget>[
                        SizedBox(
                          height: 30, // <-- SEE HERE
                        ),

                        const SizedBox(
                          height: 10,
                        ),

                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('EUSER_QID :'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.eUSERQID.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),


                        const SizedBox(
                          height: 10,
                        ),

                        if (widget.paramValue.eXPNAME.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('اسم المصدر :'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.eXPNAME.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),


                        if (widget.paramValue.eXPTEL.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('هاتف المصدر'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.eXPTEL.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),


                        if (widget.paramValue.eXPQID.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [

                                Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('QID المصدر'),
                                ),
                                SizedBox(width: 10), // Add spacing between text and value
                                Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.eXPQID.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),


                        if (widget.paramValue.eXPFAX.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('فاكس المصدر'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.eXPFAX.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),


                        if (widget.paramValue.eXPCOUNTRY.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('البلد المصدر '),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.eXPCOUNTRY.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),

                        if (widget.paramValue.iMPNAME.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(' المورد'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.iMPNAME.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),


                        if (widget.paramValue.iMPADDRESS.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                          if(widget.paramValue.iMPADDRESS.toString()!='')
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('عنوان المورد'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.iMPADDRESS.toString()),
                              ),

                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),



                        if (widget.paramValue.iMPQID.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('QID المورد'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.iMPQID.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),


                        if (widget.paramValue.iMPFAX.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('فاكس المورد'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.cOMPID.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),

                        if (widget.paramValue.iMPTEL.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('هاتف المورد'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.iMPTEL.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),


                        if (widget.paramValue.iMPPOBOX.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('المورد  POBOX'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.iMPPOBOX.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),

                        if (widget.paramValue.iMPCOUNTRY.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('البلد المورد'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.cOMPID.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),

                        if (widget.paramValue.oRIGINCOUNTRY.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('البلد الأصلي'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.oRIGINCOUNTRY.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),

                        if (widget.paramValue.sHIPPINGPLACE.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('مكان الشحن'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.sHIPPINGPLACE.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),
                        if (widget.paramValue.eNTERYPORT.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('منفذ الدخول'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.eNTERYPORT.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),

                        if (widget.paramValue.tRANSPORT.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('الناقل'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.tRANSPORT.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),

                        if (widget.paramValue.sHIPPINGDATE.toString() != 'null')
                        Padding(
                          padding: EdgeInsets.all(10), // Add your desired padding values here
                          child: Row(
                            children: [
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text('تاريخ الشحن'),
                              ),
                              SizedBox(width: 10), // Add spacing between text and value
                              Directionality(
                                textDirection: TextDirection.rtl,
                                child: Text(widget.paramValue.sHIPPINGDATE.toString()),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),





                        if (widget.paramValue.eXPNATIONALITY.toString() != 'null')
                          Padding(
                            padding: EdgeInsets.all(10), // Add your desired padding values here
                            child: Row(
                              children: [
                                Directionality(
                                  textDirection: TextDirection.rtl,
                                  child: Text('الجنسية المصدر '),
                                ),
                                SizedBox(width: 10), // Add spacing between text and value
                                Directionality(
                                  textDirection: TextDirection.rtl,
                                  child: Text(widget.paramValue.eXPNATIONALITY.toString()),
                                ),
                              ],
                            ),
                          ),
                        const SizedBox(
                          height: 10,
                        ),





                        if (widget.paramValue.eXPPASSPORTNUM.toString() != 'null')
                          Padding(
                            padding: EdgeInsets.all(10), // Add your desired padding values here
                            child: Row(
                              children: [
                                Directionality(
                                  textDirection: TextDirection.rtl,
                                  child: Text('رقم جواز السفر'),
                                ),
                                SizedBox(width: 10), // Add spacing between text and value
                                Directionality(
                                  textDirection: TextDirection.rtl,
                                  child: Text(widget.paramValue.eXPPASSPORTNUM.toString()),
                                ),
                              ],
                            ),
                          ),
                        const SizedBox(
                          height: 10,
                        ),






                        if (widget.paramValue.eXPECTEDARRIVALDATE.toString() != 'null')
                          Padding(
                            padding: EdgeInsets.all(10), // Add your desired padding values here
                            child: Row(
                              children: [
                                Directionality(
                                  textDirection: TextDirection.rtl,
                                  child: Text('تاريخ الوصول المتوقع'),
                                ),
                                SizedBox(width: 10), // Add spacing between text and value
                                Directionality(
                                  textDirection: TextDirection.rtl,
                                  child: Text(widget.paramValue.eXPECTEDARRIVALDATE.toString()),
                                ),
                              ],
                            ),
                          ),







                        Text('قائمة الحيوانات'),

                        const SizedBox(
                          height: 2,
                        ),

                        Padding(
                            padding: EdgeInsets.only(left: 40.0, right: 40.0,top: 2.0,bottom: 2.0), // Adjust the padding values as needed
                            child:
                            ListView.builder(
                              shrinkWrap: true,
                              itemCount: widget.paramValue.animal?.length,
                              itemBuilder: (context, index) {
                                return Card(
                                  elevation: 4, // You can adjust the elevation for the shadow effect
                                  shape: RoundedRectangleBorder(
                                    borderRadius: BorderRadius.circular(30.0), // Radius of 5 for rounded corners
                                  ),
                                  child: Container(
                                    decoration: BoxDecoration(
                                      // color: Colors.blue, // Blue background color
                                      borderRadius: BorderRadius.circular(30.0),
                                    ),
                                    child: ListTile(
                                      title: Text('البلد الأصلي: ${widget.paramValue.animal?[index].oRIGINCOUNTRY}'),
                                    ),
                                  ),
                                );
                              },
                            )
                        ),
                        const SizedBox(
                          height: 20,
                        ),




                        const SizedBox(
                          height: 2,
                        ),



                      ]
                  ),
                )

            )
        )
    );
  }




}
