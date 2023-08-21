import 'package:flutter/material.dart';
import 'package:flutter_frent/screens/home.dart';

import '../home.dart';
class BackContent extends StatefulWidget{
  const BackContent({Key? key}): super(key:key);

  @override
  _BackContentState createState() => _BackContentState();
}



class _BackContentState extends State<BackContent>{
 Color _primaryColor = Color.fromARGB(220,84,254,1000);
  Color _accentColor = Color.fromARGB(138,2,174,1000);
  @override
  Widget build(BuildContext context) {
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
    body:Text('In scren')


    )
    );
  }
}
