import 'package:flutter/material.dart';
import 'package:flutter_frent/home.dart';
class InContent extends StatefulWidget{
  const InContent({Key? key}): super(key:key);

  @override
  _InContentState createState() => _InContentState();
}



class _InContentState extends State<InContent>{
 Color _primaryColor = Color.fromARGB(220,84,254,1000);
  Color _accentColor = Color.fromARGB(138,2,174,1000);
  @override
  Widget build(BuildContext context) {
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
