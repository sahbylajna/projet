
// ignore_for_file: use_build_context_synchronously

import 'package:flutter/cupertino.dart';
import 'package:flutter/gestures.dart';
import 'package:flutter/material.dart';
import 'package:flutter_frent/common/theme_helper.dart';
import 'package:flutter_frent/model/token.dart';
import 'package:flutter_frent/model/user.dart';
import 'package:flutter_frent/register.dart';
import 'package:http/http.dart' as http;
import 'package:flutter_frent/constants.dart';
import 'package:flutter_frent/api_service.dart';
import 'package:flutter_frent/model/contrie.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'home.dart';
import 'widgets/header_widget.dart';

class LoginPage extends StatefulWidget{
  const LoginPage({Key? key}): super(key:key);

  @override
  _LoginPageState createState() => _LoginPageState();
}



class _LoginPageState extends State<LoginPage>{
 final user = SharedPreferences.getInstance();
      late List<Contries> _contrie = [];
    Contries? _selectedValue;

@override
  void initState() {
    super.initState();
    _getData();
  }
  double _headerHeight = 250;
  Key _formKey = GlobalKey<FormState>();
  void _getData() async {

    final prefs = await SharedPreferences.getInstance();

 if(prefs.getString('ud') != null){


        Navigator.of(context).pushAndRemoveUntil(
        MaterialPageRoute(builder: (context) => MyHomePage()), (route) => false);
    }
      _contrie = (await ApiService().getcontries())!;
Future.delayed(const Duration(seconds: 1)).then((value) => setState(() {

    }));
  }
  TextEditingController phone = TextEditingController();
  TextEditingController password = TextEditingController();
  @override
  Widget build(BuildContext context) {
    final _screen =  MediaQuery.of(context).size;
    return Directionality(
      textDirection: TextDirection.rtl,
      child:Scaffold(
      backgroundColor: Colors.white,
      body: SingleChildScrollView(
        child: Column(
          children: [
            Container(
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


                        Row(

                          children: [


                            Container(
                                width: _screen.width * 0.45,

                                child:Container(
                                  child: TextField(
                                    controller: phone,
                                    decoration: ThemeHelper().textInputDecoration('الهاتف', 'أدخل رقم هاتفك'),
                                    keyboardType: TextInputType.number,),

                                  decoration: ThemeHelper().inputBoxDecorationShaddow(),

                                )),
                            Directionality(
                                textDirection: TextDirection.rtl,
                                child:Container(
                                  padding: EdgeInsets.symmetric(horizontal: 10.0),
                                  decoration: BoxDecoration(
                                    borderRadius: BorderRadius.circular(15.0),
                                    border: Border.all(
                                        color: Colors.deepPurple.shade300, style: BorderStyle.solid, width: 0.80),
                                  ),
                                  child: DropdownButton<Contries>(

                                    //isDense: true,
                                    hint: Text('اختر دولتك'),
//isDense: true,
                                    //    isExpanded: true,
                                    value: _selectedValue,

                                    icon: Icon(Icons.check_circle_outline),
                                    iconSize: 24,
                                    elevation: 16,
                                    //style: ThemeHelper().buttonStyle(),
                                    style: TextStyle(color: Colors.deepPurple),
                                    underline: Container(
                                      height: 2,
                                      color: Colors.blue[300],
                                    ),
                                    onChanged:( newValue) {
                                      setState(() {
                                        _selectedValue = newValue;
                                        //  contry_id =_contrie.indexOf();
                                      });
                                    },
                                    items:
                                    _contrie.map<DropdownMenuItem<Contries>>((Contries value) {
                                      return DropdownMenuItem<Contries>(
                                        value:  value ,
                                        child: Text('+'+ value.phonecode.toString() ),
                                      );
                                    }).toList(),
                                  ),
                                )

                            ),


                          ],
                        ) ,

                            SizedBox(height: 10.0),

                            Directionality(
      textDirection: TextDirection.rtl,
      child:Container(
                              child: TextField(
                                obscureText: true,
                                controller: password,
                                decoration: ThemeHelper().textInputDecoration('كلمة المرور', 'ادخل رقمك السري'),
                              ),
                              decoration: ThemeHelper().inputBoxDecorationShaddow(),
                            )),
                            SizedBox(height: 15.0),
                            // Container(
                            //   margin: EdgeInsets.fromLTRB(10,0,10,20),
                            //   alignment: Alignment.topRight,
                            //   child: GestureDetector(
                            //     onTap: () {
                            //      // Navigator.push( context, MaterialPageRoute( builder: (context) => ForgotPasswordPage()), );
                            //     },
                            //     child: Text( "Forgot your password?", style: TextStyle( color: Colors.grey, ),
                            //     ),
                            //   ),
                            // ),
                            Container(
                              decoration: ThemeHelper().buttonBoxDecoration(context),
                              child: ElevatedButton(
                                style: ThemeHelper().buttonStyle(),
                                child: Padding(
                                  padding: EdgeInsets.fromLTRB(40, 10, 40, 10),
                                  child: Text('تسجيل الدخول'.toUpperCase(), style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold, color: Colors.white),),
                                ),
                                onPressed: () async {
                                    if (phone.text.isEmpty || password.text.isEmpty || _selectedValue == null) {
                                        showDialog(
                                    context: context,
                                    builder: (BuildContext context) {
                                      return ThemeHelper().alartDialog("إنتباه",
                                        'رقم الهاتف أو كلمة المرور غير صحيحة' ,
                                          context);
                                    },
                                  );
                                    }

                                    Token token = (await ApiService().login(phone.text,password.text,_selectedValue!.id.toString()))!;
                                    if(!token.error.isEmpty){
                                           showDialog(
                                    context: context,
                                    builder: (BuildContext context) {
                                      return ThemeHelper().alartDialog("إنتباه",
                                        'رقم الهاتف أو كلمة المرور غير صحيحة' ,
                                          context);
                                    },
                                  );
                                    }else{
                                //          showDialog(
                                //     context: context,
                                //     builder: (BuildContext context) {
                                //       return ThemeHelper().alartDialog("إنتباه",
                                //         token.accessToken.toString() ,
                                //           context);
                                //     },
                                //   );
                                  final user = await SharedPreferences.getInstance();
                                    user.setString('phone',phone.text);
                                    user.setString('token',token.accessToken);
                                    User  _user = (await ApiService().getuser())!;
                                    user.setString('phone',_user.phone);
         user.setString('first_name',_user.firstName);
         user.setString('last_name',_user.lastName);
         user.setString('email',_user.email);
         user.setString('ud',_user.ud);

         user.setInt('contry_id',_user.contryId);
     Navigator.pushReplacement(context, MaterialPageRoute(builder: (context) => MyHomePage()));


                                    }


                                    //_selectedValue!.id
                                  //After successful login we will redirect to profile page. Let's create profile page now
                              //
                                },
                              ),
                            ),
                            Container(
                              margin: EdgeInsets.fromLTRB(10,20,10,20),
                              //child: Text('Don\'t have an account? Create'),
                              child: Text.rich(
                                TextSpan(
                                  children: [
                                    TextSpan(text: "ليس لديك حساب؟ ",
                                    recognizer: TapGestureRecognizer()
                                        ..onTap = (){
                                         Navigator.push(context, MaterialPageRoute(builder: (context) => RegistrationPage()));
                                        },),

                                  ]
                                )
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
