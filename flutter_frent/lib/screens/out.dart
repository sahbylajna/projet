import 'package:flutter/material.dart';
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
