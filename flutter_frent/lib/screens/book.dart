import 'package:flutter/material.dart';
import 'package:flutter_frent/screens/home.dart';

import '../home.dart';
class BookContent extends StatefulWidget{
  const BookContent({Key? key}): super(key:key);

  @override
  _BookContentState createState() => _BookContentState();
}



class _BookContentState extends State<BookContent>{
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
