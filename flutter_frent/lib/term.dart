

import 'dart:convert';
import 'dart:typed_data';

import 'package:flutter/material.dart';
import 'package:tasareeh/Otp.dart';
import 'package:tasareeh/model/term.dart';
import 'package:tasareeh/widgets/header_widget.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:syncfusion_flutter_signaturepad/signaturepad.dart';
import 'package:blurry_modal_progress_hud/blurry_modal_progress_hud.dart';
import 'api_service.dart';
import 'common/theme_helper.dart';
import 'dart:ui' as ui;

import 'package:flutter_spinkit/flutter_spinkit.dart';


import 'package:tasareeh/model/success.dart';

class TermContent extends StatefulWidget   {

  @override
  State<StatefulWidget> createState() {
     return _TermContentState();
  }




}
class _TermContentState extends State<TermContent>{
  bool _isLoading = false;
      double _headerHeight = 250;
       term? _term ;
       late String imageEncoded;
  Key _formKey = GlobalKey<FormState>();
@override
  void initState() {
    super.initState();
    _getData();
  }

show(BuildContext context){
    Widget okButton = TextButton(
    child: Text("حسنا"),
    onPressed: () {
    Navigator.of(context).pop();


    },
  );

  // set up the AlertDialog
  AlertDialog alert = AlertDialog(
    title: Text("خطأ"),
    content: Text( 'الرجاء إدخال بيانات صحيحة'),
    actions: [
      okButton,
    ],
  );

  // show the dialog
  showDialog(
    context: context,
    builder: (BuildContext context) {
      return alert;
    },
  );

}
  GlobalKey<SfSignaturePadState> _signaturePadKey = GlobalKey();

   void _handleSaveButtonPressed(BuildContext context) async {
     final data =
        await _signaturePadKey.currentState!.toImage(pixelRatio: 3.0);
    final bytes = await data.toByteData(format: ui.ImageByteFormat.png);
    await Navigator.of(context).push(
      MaterialPageRoute(
        builder: (BuildContext context) {
          return Scaffold(
            appBar: AppBar(),
            body: Center(
              child: Container(
                color: Colors.grey[300],
                child: Image.memory(bytes!.buffer.asUint8List()),
              ),
            ),
          );
        },
      ),
    );
  }

showAlertDialog(BuildContext context){
    AlertDialog alert=AlertDialog(
      content: Row(
        children: [
          CircularProgressIndicator(),
          Container(margin: EdgeInsets.only(left: 2),child:Text("Loading" )),
        ],),
    );
    showDialog(
        context: context,
        builder: (context) {
          Future.delayed(Duration.zero, () {
            Navigator.of(context).pop(true);
          });
          return alert;
        });
  }
    void _getData() async {


Future.delayed(const Duration(seconds: 1)).then((value) => setState(() {
         showAlertDialog(context);
       }));

      _term = (await ApiService().getterm())!;
Future.delayed(const Duration(seconds: 1)).then((value) => setState(() {

    }));
  }
  @override
  Widget build( context) {
  bool isLoading = false;

  final screen =  MediaQuery.of(context).size;
    if(_term == null ){
    return Scaffold(
      backgroundColor: Colors.blueGrey,
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            BlurryModalProgressHUD(
    inAsyncCall: isLoading,
    blurEffectIntensity: 4,
    progressIndicator: SpinKitFadingCircle(
    color: Colors.deepPurple.shade300,
    size: 90.0,
    ),
    dismissible: false,
    opacity: 0.4,
    color: Colors.deepPurple.shade300,
    child: Scaffold(),
)
          ],
        ),
      ),
    );
    }else{

    return Directionality(
      textDirection: TextDirection.rtl,
      child:Scaffold(
      backgroundColor: Colors.white,
      body: SingleChildScrollView(
        child: Column(
          children: [
            SizedBox(
              height: _headerHeight,
              child: HeaderWidget(_headerHeight, true, Icons.login_rounded), //let's create a common header widget
            ),
            SafeArea(
              child: Container(
                padding: EdgeInsets.fromLTRB(20, 10, 20, 10),
                  margin: EdgeInsets.fromLTRB(20, 10, 20, 10),// This will be the login form
                child: Column(
                  children: [
                    Text(
                      'مرحبًا',
                      style: TextStyle(fontSize: 60, fontWeight: FontWeight.bold),
                    ),
                    Text(
                      'سجل الدخول إلى حسابك',
                      style: TextStyle(color: Colors.grey),
                    ),
                    SizedBox(height: 30.0),
                    Form(
                      key: _formKey,
                        child: Column(
                          children: [

                            Text(_term!.termAr.toString()),



                            SizedBox(height: 10.0),


                            SizedBox(height: 15.0),

Container(
                              decoration: ThemeHelper().buttonBoxDecoration(context),
                              child:ElevatedButton(
        onPressed: () {
          showDialog(
            context: context,
            builder: (context) {
              return  AlertDialog(
        contentPadding: const EdgeInsets.all(6.0),
        title: Text('إمضاء'),
        content: Column(mainAxisAlignment: MainAxisAlignment.start,
        mainAxisSize: MainAxisSize.min,
        children: [SfSignaturePad(
key: _signaturePadKey,
                      backgroundColor: Colors.white,
                      strokeColor: Colors.black,
                      minimumStrokeWidth: 1.0,
                      maximumStrokeWidth: 4.0),]),
            actions: [
ElevatedButton(                     // FlatButton widget is used to make a text to work like a button

                  onPressed: () {
                    Navigator.of(context).pop();
                  },             // function used to perform after pressing the button
                  child: Text('إلغاء'),
                ),
                ElevatedButton(

                  onPressed: () async {
                      ui.Image signatureData  = await _signaturePadKey.currentState!.toImage();

ByteData? byteData = await signatureData.toByteData(format: ui.ImageByteFormat.png);
 imageEncoded =
   "data:image/png;base64,${base64.encode(byteData!.buffer.asUint8List())}";

print("Encoded: $imageEncoded");          //   print(image.clone.toString());
                    //   print(_signaturePadKey.currentState.);
                    //   _handleSaveButtonPressed(context);
  Navigator.of(context, rootNavigator: true).pop();
                  },
                  child: Text('قبول'),
                ),
            ],
          );
            },
          );
        },
style: ThemeHelper().buttonStyle(),
       child: Padding(
                                  padding: EdgeInsets.fromLTRB(40, 10, 40, 10),
                                  child: Text('إمضاء'),),
      ),
),


                            Container(
                              decoration: ThemeHelper().buttonBoxDecoration(context),
                              child: ElevatedButton(
                                style: ThemeHelper().buttonStyle(),
                                child: Padding(
                                  padding: EdgeInsets.fromLTRB(40, 10, 40, 10),
                                  child: Text('تسجيل '.toUpperCase(), style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold, color: Colors.white),),
                                ),
                                onPressed: () async {
if(imageEncoded.isNotEmpty){
         final user = await SharedPreferences.getInstance();
Success? success = await ApiService().signature(imageEncoded,user.get('id'));

  if(success?.message.toString() == 'success'){
                 Navigator.push(context, MaterialPageRoute(builder: (context) => Otp()));
  }else{
 show(context);
  }
}else{
 show(context);
  }








                                    //_selectedValue!.id
                                  //After successful login we will redirect to profile page. Let's create profile page now
                              //
                                },
                              ),
                            ),

                          ],
                        )
                    ),
                  ],
                )
              ),
            ),
          ],
        ),
      ),
    ));

}

}

}
