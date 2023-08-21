import 'package:flutter/material.dart';
import 'package:flutter_frent/common/theme_helper.dart';
import 'package:flutter_frent/login.dart';
import 'package:flutter_frent/screens/home.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../api_service.dart';
import '../model/user.dart';

class AccountContent extends StatefulWidget {
  @override
  _AccountContentState createState() => _AccountContentState();

}



class _AccountContentState extends State<AccountContent> {
  late SharedPreferences prefs;
   Color _primaryColor = Color.fromARGB(220,84,254,1000);
  Color _accentColor = Color.fromARGB(138,2,174,1000);
  User?  _user;
  @override
  void initState() {
    super.initState();
    _getData();

  }

    Future<void> _getData() async {
      Future.delayed(const Duration(seconds: 1)).then((value) => setState(() {
      }));
    _user = (await ApiService().getuser());


  }


    void logout() async {
    final prefs = await SharedPreferences.getInstance();

      prefs.clear();

     Navigator.of(context).pushAndRemoveUntil(MaterialPageRoute(builder: (context) => LoginPage()), (route) => false);


  }
  showAlertDialog(BuildContext context){
    AlertDialog alert=AlertDialog(
      content: new Row(
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
  @override
  Widget build(BuildContext context) {


     if(_user == null){
       Future.delayed(const Duration(seconds: 1)).then((value) => setState(() {
         showAlertDialog(context);
       }));
       return Directionality(
      textDirection: TextDirection.rtl,
      child:Scaffold(
           appBar:AppBar(
      title: Center(child: Text('اللجنة المنضمة لسباق الهجن ')),
      shape: RoundedRectangleBorder(
        borderRadius: BorderRadius.vertical(
          bottom: Radius.circular(40.0),
        ),
      ),

    ),
    body: Directionality(
         textDirection: TextDirection.rtl,


         child: Column(

           children: <Widget>[

             Card(
               child: Container(

                 alignment: Alignment.centerRight,
                 padding: EdgeInsets.all(15),


                 child: Column(
                   children: <Widget>[
                     Column(
                       children: <Widget>[
                         ...ListTile.divideTiles(
                           color: Colors.grey,
                           tiles: [


                             ListTile(
                               leading: Icon(Icons.email),
                               title: Text("بريد إلكتروني"),
                               subtitle: Text(''),
                             ),
                             ListTile(
                               leading: Icon(Icons.phone),
                               title: Text("هاتف"),
                               subtitle: Text(''),
                             ),
                             ListTile(
                               leading: Icon(Icons.person),
                               title: Text("ud"),
                               subtitle: Text(''),
                             ),
                           ],
                         ),
                       ],
                     )
                   ],
                 ),
               ),
             )
           ],
         ),
       )));

     }else{
       return Directionality(
           textDirection: TextDirection.rtl,
           child:Scaffold(
           appBar: AppBar(
           title: const Text('اللجنة المنضمة لسباق الهجن'),
             backgroundColor: _accentColor,
    actions: <Widget>[
    IconButton(
    icon: const Icon(Icons.add_alert),
    tooltip: 'Show Snackbar',
    onPressed: () {
    ScaffoldMessenger.of(context).showSnackBar(
    const SnackBar(content: Text('This is a snackbar')));
    },
    ),
    // IconButton(
    // icon: const Icon(Icons.navigate_next),
    // tooltip: 'Go to the next page',
    // onPressed: () {
    // Navigator.push(context, MaterialPageRoute<void>(
    // builder: (BuildContext context) {
    // return Scaffold(
    // appBar: AppBar(
    // title: const Text('Next page'),
    // ),
    // body: const Center(
    // child: Text(
    // 'This is the next page',
    // style: TextStyle(fontSize: 24),
    // ),
    // ),
    // );
    // },
    // ));
    // },
    // ),
    ],
    ),
    body:Directionality(
         textDirection: TextDirection.rtl,

         child: Column(
           children: <Widget>[

             Card(
               child: Container(

                 alignment: Alignment.center,

                 padding: EdgeInsets.all(15),
                 child: Column(
                   children: <Widget>[
                     Column(
                       children: <Widget>[
                         ...ListTile.divideTiles(
                           color: Colors.grey,
                           tiles: [


                             ListTile(
                               leading: Icon(Icons.email),
                               title: Text("بريد إلكتروني"),
                               subtitle: Text(_user!.email),
                             ),
                             ListTile(
                               leading: Icon(Icons.phone),
                               title: Text("هاتف"),
                               subtitle: Text(_user!.phone),
                             ),
                             ListTile(
                               leading: Icon(Icons.person),
                               title: Text("ud"),
                               subtitle: Text(_user!.ud),
                             ),
                           ],
                         ),
                       ],
                     )
                   ],
                 ),
               ),
             ),
             Container(
                              decoration: ThemeHelper().buttonBoxDecoration(context),
                              child: ElevatedButton(
                                style: ThemeHelper().buttonStyle(),
                                child: Padding(
                                  padding: EdgeInsets.fromLTRB(40, 10, 40, 10),
                                  child: Text('تسجيل خروج'.toUpperCase(), style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold, color: Colors.white),),
                                ),
                                onPressed: ()  {
                                    logout();

                                },
                              ),
                            ),
           ],
         ),
       )
       ));
     }

  }
}
