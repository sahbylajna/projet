import 'dart:developer';
import 'dart:io';

import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_frent/common/theme_helper.dart';
import 'package:flutter_frent/model/success.dart';
import 'package:flutter_frent/model/token.dart';
import 'package:flutter_frent/widgets/header_widget.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:image_picker/image_picker.dart';


import 'api_service.dart';
import 'login.dart';
import 'model/contrie.dart';

class RegistrationPage extends  StatefulWidget{
  @override
  State<StatefulWidget> createState() {
     return _RegistrationPageState();
  }
}

class _RegistrationPageState extends State<RegistrationPage>{
 Contries? _selectedValue;
   late List<Contries> _contrie = [];
  final _formKey = GlobalKey<FormState>();
  bool checkedValue = false;
  bool checkboxValue = false;
   TextEditingController phone = TextEditingController();
  TextEditingController password = TextEditingController();
   TextEditingController email = TextEditingController();
  TextEditingController fistname = TextEditingController();
  TextEditingController ud = TextEditingController();
  TextEditingController lastname = TextEditingController();
@override
  void initState() {
    super.initState();
    _getData();
  }

  void _getData() async {
      _contrie = (await ApiService().getcontries())!;
Future.delayed(const Duration(seconds: 1)).then((value) => setState(() {

    }));
  }


  ImagePicker picker = ImagePicker();
  XFile? image;

   ImagePicker picker2 = ImagePicker();
  XFile? image2;





  @override
  Widget build(BuildContext context) {
    final _screen =  MediaQuery.of(context).size;
    return Directionality(
      textDirection: TextDirection.rtl,
      child:Scaffold(
      backgroundColor: Colors.white,
      body: SingleChildScrollView(
        child: Stack(
          children: [
            Container(
              height: 150,
              child: HeaderWidget(150, false, Icons.person_add_alt_1_rounded),
            ),
            Container(
              margin: EdgeInsets.fromLTRB(25, 50, 25, 10),
              padding: EdgeInsets.fromLTRB(10, 50, 10, 0),
              alignment: Alignment.center,
              child: Column(
                children: [
                  Form(
                    key: _formKey,
                    child: Column(
                      children: [

                        SizedBox(height: 30,),
                        Container(
                            padding: EdgeInsets.only(top: 50.0),
                          child: TextFormField(
                            decoration: ThemeHelper().textInputDecoration('الاسم الأول', 'أدخل اسمك الأول'),
                             controller: fistname,
                          ),
                          decoration: ThemeHelper().inputBoxDecorationShaddow(),
                        ),
                        SizedBox(height: 30,),
                        Container(
                          child: TextFormField(
                            decoration: ThemeHelper().textInputDecoration('اسم العائلة', 'أدخل اسم العائلة الخاص بك'),
                             controller: lastname,
                          ),
                          decoration: ThemeHelper().inputBoxDecorationShaddow(),
                        ),
                        SizedBox(height: 20.0),
                        Container(
                          child: TextFormField(
                             controller: email,
                            decoration: ThemeHelper().textInputDecoration("بريد إلكتروني", "أدخل بريدك الإلكتروني"),
                            keyboardType: TextInputType.emailAddress,
                            validator: (val) {
                              if(!(val!.isEmpty) && !RegExp(r"^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,253}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,253}[a-zA-Z0-9])?)*$").hasMatch(val)){
                                return "أدخل عنوان بريد إلكتروني صحيحًا";
                              }

                            },
                          ),
                          decoration: ThemeHelper().inputBoxDecorationShaddow(),
                        ),
                        SizedBox(height: 20.0),
                        Container(
                          child: TextFormField(
                            decoration: ThemeHelper().textInputDecoration(
                                " رقم ال id",
                                "أدخل رقم id"),
                                controller: ud,
                            keyboardType: TextInputType.number,
                            validator: (val) {
                              if(!(val!.isEmpty) && !RegExp(r"^(\d+)*$").hasMatch(val)){
                                return "أدخل رقم id صحيحًا";
                              }

                            },
                          ),
                          decoration: ThemeHelper().inputBoxDecorationShaddow(),
                        ),

SizedBox(height: 20.0),
                       Row(
  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children:[
                        // SizedBox(height: 20.0),
                        Container(
width: _screen.width * 0.45,
                          child: TextFormField(
                            decoration: ThemeHelper().textInputDecoration(
                                "رقم الهاتف",
                                "أدخل رقم هاتفك"),
                                controller: phone,
                            keyboardType: TextInputType.phone,
                            validator: (val) {
                              if(!(val!.isEmpty) && !RegExp(r"^(\d+)*$").hasMatch(val)){
                                return "أدخل رقم هاتف صحيحًا";
                              }

                            },
                          ),
                          decoration: ThemeHelper().inputBoxDecorationShaddow(),
                        ),
                         Container(

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
          ),]),

                        SizedBox(height: 20.0),
                       Row(
                        children: [
 Container(

                          child:ElevatedButton(
                  onPressed: () async {
                      image = await picker.pickImage(source: ImageSource.gallery);
                      setState(() {
                        //update UI
                      });
                  },
                  child: Text("الصورة الامامية لل id")
                ),



                              ),
 image == null?Container():Image.file(File(image!.path),
width: _screen.width * 0.40,
 height: _screen.width * 0.20,)




                        ],
                       ),
     SizedBox(height: 20.0),
                       Row(
                        children: [
 Container(

                          child:ElevatedButton(
                  onPressed: () async {
                      image2 = await picker2.pickImage(source: ImageSource.gallery);
                      setState(() {
                        //update UI
                      });
                  },
                  child: Text("الصورة الخلفية لل id")
                ),



                              ),
 image2 == null?Container():Image.file(File(image2!.path),
width: _screen.width * 0.40,
 height: _screen.width * 0.20,)




                        ],
                       ),



                        SizedBox(height: 30,),


















                        Container(
                          child: TextFormField(
                            obscureText: true,
                            decoration: ThemeHelper().textInputDecoration(
                                "كلمة المرور*", "ادخل رقمك السري"),
                                 controller: password,
                            validator: (val) {
                              if (val!.isEmpty) {
                                return "من فضلك أدخل رقمك السري";
                              }

                            },
                          ),
                          decoration: ThemeHelper().inputBoxDecorationShaddow(),
                        ),
                        SizedBox(height: 15.0),
                        FormField<bool>(
                          builder: (state) {
                            return Column(
                              children: <Widget>[
                                Row(
                                  children: <Widget>[
                                    Checkbox(
                                        value: checkboxValue,
                                        onChanged: (value) {
                                          setState(() {
                                            checkboxValue = value!;
                                            state.didChange(value);
                                          });
                                        }),
                                    Text("أوافق على جميع الشروط والأحكام.", style: TextStyle(color: Colors.grey),),
                                  ],
                                ),
                                Container(
                                  alignment: Alignment.centerLeft,
                                  child: Text(
                                    state.errorText ?? '',
                                    textAlign: TextAlign.left,
                                    style: TextStyle(color: Theme.of(context).errorColor,fontSize: 12,),
                                  ),
                                )
                              ],
                            );
                          },
                          validator: (value) {
                            if (!checkboxValue) {
                              return 'تحتاج إلى قبول الشروط والأحكام';
                            } else {

                            }
                          },
                        ),
                        SizedBox(height: 20.0),
                        Container(
                          decoration: ThemeHelper().buttonBoxDecoration(context),
                          child: ElevatedButton(
                            style: ThemeHelper().buttonStyle(),
                            child: Padding(
                              padding: const EdgeInsets.fromLTRB(40, 10, 40, 10),
                              child: Text(
                                "تسجيل".toUpperCase(),
                                style: TextStyle(
                                  fontSize: 20,
                                  fontWeight: FontWeight.bold,
                                  color: Colors.white,
                                ),
                              ),
                            ),
                            onPressed: () async {
                              if (_formKey.currentState!.validate()) {
log(fistname.text);
log(lastname.text);
log(email.text);
log(phone.text);
log(password.text);
log(_selectedValue!.id.toString());

 Success success =  (await ApiService().register(fistname.text,lastname.text,phone.text,password.text,email.text,ud.text,_selectedValue!.id.toString(),image!.path,image2!.path))!;




log(success.toString());
                                // Navigator.of(context).pushAndRemoveUntil(
                                //     MaterialPageRoute(
                                //         builder: (context) => LoginPage()
                                //     ),
                                //         (Route<dynamic> route) => false
                                // );
                              }
                            },
                          ),
                        ),
                        SizedBox(height: 30.0),


                      ],
                    ),
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
    ));
  }

}
