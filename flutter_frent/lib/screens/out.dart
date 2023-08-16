import 'package:flutter/material.dart';
import 'package:flutter_frent/home.dart';
import 'package:flutter_frent/screens/home.dart';
class OutContent extends StatefulWidget{
  const OutContent({Key? key}): super(key:key);

  @override
  _OutContentState createState() => _OutContentState();
}



class _OutContentState extends State<OutContent>{
 Color _primaryColor = Color.fromARGB(220,84,254,1000);
  Color _accentColor = Color.fromARGB(138,2,174,1000);
  @override
  Widget build(BuildContext context) {
     return Directionality(
        textDirection: TextDirection.rtl,
        child:Scaffold(
        appBar: AppBar(
          backgroundColor: Colors.blue,
          shape: CustomShapeBorder(),

          actions: <Widget>[

          ],
        ),
    body:Text('In scren')


    )
    );
  }
}
