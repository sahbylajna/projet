import 'package:flutter/material.dart';
import 'package:flutter_frent/api_service.dart';
import 'package:flutter_frent/model/count.dart';
import 'package:flutter_frent/screens/back.dart';
import 'package:flutter_frent/screens/book.dart';
import 'package:flutter_frent/screens/in.dart';
import 'package:flutter_frent/screens/out.dart';
import 'package:shared_preferences/shared_preferences.dart';

class HomeContent extends StatefulWidget {

 @override
  _HomeContentState createState() => _HomeContentState();

}



class _HomeContentState extends State<HomeContent> {
count? _count;
String importations='0';
String exports='0';
String backs='0';

 Color _primaryColor = Color.fromARGB(220,84,254,1000);
  Color _accentColor = Color.fromARGB(138,2,174,1000);
   @override
  void initState() {
    super.initState();
  _getData() ;

  }

 Future<void> _getData() async {



  final user = await SharedPreferences.getInstance();
 _count = await ApiService().getcount();
   await Future.delayed(const Duration(seconds: 3));
print(_count?.backs);
exports = _count!.exports;
importations = _count!.importations;
backs = _count!.backs;

   // show(context);
   print('hmaaa0');



  }

  @override
  Widget build(context) {
    var borderRadius = BorderRadius.circular(8.0);
_getData();
    return Directionality(
        textDirection: TextDirection.rtl,
        child:Scaffold(
        appBar: AppBar(
          backgroundColor: Colors.blue,
          shape: CustomShapeBorder(),

          actions: <Widget>[

          ],
        ),
    body:

    Center(
        child: Column(
        mainAxisAlignment: MainAxisAlignment.spaceEvenly,
        children: <Widget>[


       Row(
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [
      OutlinedButton(
        onPressed: () {
             Navigator.pushReplacement(context, MaterialPageRoute(builder: (context) => InContent()));
        },

   style: OutlinedButton.styleFrom(

      foregroundColor: Colors.white,
      side:BorderSide(color: Colors.blue),
      shape: const RoundedRectangleBorder(
              borderRadius: BorderRadius.all(
                Radius.circular(18),
              ),
            ),

 backgroundColor: Colors.white,
      elevation: 20,
       fixedSize: Size(150,200),
    ),
  child: Column(
    crossAxisAlignment: CrossAxisAlignment.start,
    children: [
        SizedBox(
      height: 10, // <-- SEE HERE
    ),
          Row(
            textDirection: TextDirection.rtl,
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [
    Text(
        importations ,
        style: Theme.of(context).textTheme.subtitle1,
      ),
         SizedBox(
      width: 30, // <-- SEE HERE
    ),
 Image.asset('assets/in.png',height: 50,
    width: 50,)

  ]),
SizedBox(
      height: 100, // <-- SEE HERE
    ),

    Row(
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [

      Text(" طلب دخول",style: TextStyle(color: Colors.black)),

      SizedBox(
      width: 50, // <-- SEE HERE
    ),
  ]),

    ],

  ),
    ),






 OutlinedButton(
        onPressed: () {
             Navigator.pushReplacement(context, MaterialPageRoute(builder: (context) => OutContent()));
        },

   style: OutlinedButton.styleFrom(

      foregroundColor: Colors.white,
      side:BorderSide(color: Colors.blue),
      shape: const RoundedRectangleBorder(
              borderRadius: BorderRadius.all(
                Radius.circular(18),
              ),
            ),

 backgroundColor: Colors.white,
      elevation: 20,
       fixedSize: Size(150,200),
    ),
  child: Column(
    crossAxisAlignment: CrossAxisAlignment.start,
    children: [
        SizedBox(
      height: 10, // <-- SEE HERE
    ),
          Row(
            textDirection: TextDirection.rtl,
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [
    Text(
         exports ,
        style: Theme.of(context).textTheme.subtitle1,
      ),
         SizedBox(
      width: 30, // <-- SEE HERE
    ),
 Image.asset('assets/out.png',height: 50,
    width: 50,)

  ]),
SizedBox(
      height: 100, // <-- SEE HERE
    ),

    Row(
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [

      Text(" طلب خروج",style: TextStyle(color: Colors.black)),

      SizedBox(
      width: 50, // <-- SEE HERE
    ),
  ]),

    ],

  ),
    ),



  ],
),












       Row(
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [
      OutlinedButton(
        onPressed: () {
             Navigator.pushReplacement(context, MaterialPageRoute(builder: (context) => BackContent()));
        },

   style: OutlinedButton.styleFrom(

      foregroundColor: Colors.white,
      side:BorderSide(color: Colors.blue),
      shape: const RoundedRectangleBorder(
              borderRadius: BorderRadius.all(
                Radius.circular(18),
              ),
            ),

 backgroundColor: Colors.white,
      elevation: 20,
       fixedSize: Size(150,200),
    ),
  child: Column(
    crossAxisAlignment: CrossAxisAlignment.start,
    children: [
        SizedBox(
      height: 10, // <-- SEE HERE
    ),
          Row(
            textDirection: TextDirection.rtl,
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [
    Text(
        backs,
        style: Theme.of(context).textTheme.subtitle1,
      ),
         SizedBox(
      width: 30, // <-- SEE HERE
    ),
 Image.asset('assets/back.png',height: 50,
    width: 50,)

  ]),
SizedBox(
      height: 100, // <-- SEE HERE
    ),

    Row(
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [

      Text(" طلب عوده",style: TextStyle(color: Colors.black)),

      SizedBox(
      width: 50, // <-- SEE HERE
    ),
  ]),

    ],

  ),
    ),






 OutlinedButton(
        onPressed: () {
             Navigator.pushReplacement(context, MaterialPageRoute(builder: (context) => BookContent()));
        },

   style: OutlinedButton.styleFrom(

      foregroundColor: Colors.white,
      side:BorderSide(color: Colors.blue),
      shape: const RoundedRectangleBorder(
              borderRadius: BorderRadius.all(
                Radius.circular(18),
              ),
            ),

 backgroundColor: Colors.white,
      elevation: 20,
       fixedSize: Size(150,200),
    ),
  child: Column(
    crossAxisAlignment: CrossAxisAlignment.start,
    children: [
        SizedBox(
      height: 10, // <-- SEE HERE
    ),
          Row(
            textDirection: TextDirection.rtl,
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [

Icon( Icons.book_outlined,size: 30, color: Color.fromARGB(255, 153, 117, 96)),

  ]),
SizedBox(
      height: 100, // <-- SEE HERE
    ),

    Row(
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [

      Text(" طلب خروج",style: TextStyle(color: Colors.black)),

      SizedBox(
      width: 50, // <-- SEE HERE
    ),
  ]),

    ],

  ),
    ),



  ],
),
























        ],)
      )

    ));
  }
}


class CustomShapeBorder extends ContinuousRectangleBorder {
  @override
  Path getOuterPath(Rect rect, {TextDirection? textDirection}) {

    final double innerCircleRadius = 100.0;

    Path path = Path();
    path.lineTo(0, rect.height);
    path.quadraticBezierTo(rect.width / 2 - (innerCircleRadius / 2) - 30, rect.height + 15, rect.width / 2 - 75, rect.height + 50);
    path.cubicTo(
        rect.width / 2 - 40, rect.height + innerCircleRadius - 40,
        rect.width / 2 + 40, rect.height + innerCircleRadius - 40,
        rect.width / 2 + 75, rect.height + 50
    );
    path.quadraticBezierTo(rect.width / 2 + (innerCircleRadius / 2) + 30, rect.height + 15, rect.width, rect.height);
    path.lineTo(rect.width, 0.0);
    path.close();

    return path;
  }
}
