import 'package:flutter/material.dart';
import 'package:flutter_frent/screens/back.dart';
import 'package:flutter_frent/screens/in.dart';
import 'package:flutter_frent/screens/out.dart';

class HomeContent extends StatelessWidget {

  @override
  Widget build(context) {
    var borderRadius = BorderRadius.circular(8.0);

    return Directionality(
        textDirection: TextDirection.rtl,
        child:Scaffold(
        appBar: AppBar(
        title: const Text('اللجنة المنضمة لسباق الهجن'),
    backgroundColor: Color.fromARGB(200, 220, 84, 254),
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
    body:
    Center(
        child: Column(
        mainAxisAlignment: MainAxisAlignment.spaceEvenly,
        children: <Widget>[
ElevatedButton.icon(
  onPressed: () {
         Navigator.pushReplacement(context, MaterialPageRoute(builder: (context) => InContent()));

      // Respond to button press
  },
  style: ElevatedButton.styleFrom(
                  fixedSize: Size(200,105),
                  primary: Colors.white,

                ),
  icon: Icon(Icons.login, size: 35,color: Colors.black),
  label: Text("الدخول",style: TextStyle(color: Colors.black)),
),


ElevatedButton.icon(
  onPressed: () {
         Navigator.pushReplacement(context, MaterialPageRoute(builder: (context) => OutContent()));

      // Respond to button press
  },
  style: ElevatedButton.styleFrom(
                  fixedSize: Size(200,105),
                  primary: Colors.white,

                ),
  icon: Icon(Icons.logout, size: 35,color: Colors.black),
  label: Text("خروج ",style: TextStyle(color: Colors.black)),
),



ElevatedButton.icon(
  onPressed: () {
         Navigator.pushReplacement(context, MaterialPageRoute(builder: (context) => BackContent()));

      // Respond to button press
  },
  style: ElevatedButton.styleFrom(
                  fixedSize: Size(200,105),
                  primary: Colors.white,

                ),
  icon: Icon(Icons.add, size: 35,color: Colors.black,),
  label: Text("عوده ",style: TextStyle(color: Colors.black)),
),





        ],)
      )

    ));
  }
}
