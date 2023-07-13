import 'package:flutter/material.dart';

import '../home.dart';
class BackContent extends StatefulWidget{
  const BackContent({Key? key}): super(key:key);

  @override
  _BackContentState createState() => _BackContentState();
}



class _BackContentState extends State<BackContent>{

  @override
  Widget build(BuildContext context) {
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
    IconButton(
    icon: const Icon(Icons.navigate_next),
    tooltip: 'Go to the next page',
    onPressed: () {
     Navigator.pushReplacement(context, MaterialPageRoute(builder: (context) => MyHomePage()));
    },
    ),
    ],
    ),
    body:Text('In scren')


    )
    );
  }
}
