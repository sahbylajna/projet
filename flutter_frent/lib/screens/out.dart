import 'package:flutter/material.dart';
import 'package:tasareeh/api_service.dart';
import 'package:tasareeh/common/theme_helper.dart';
import 'package:tasareeh/home.dart';
import 'package:tasareeh/model/contrie.dart';
import 'package:tasareeh/model/success.dart';
import 'package:intl/intl.dart' as inl;

class OutContent extends StatefulWidget{
  const OutContent({Key? key}): super(key:key);

  @override
  _OutContentState createState() => _OutContentState();
}



class _OutContentState extends State<OutContent>{
  Color _primaryColor = Color.fromARGB(220,84,254,1000);
  Color _accentColor = Color.fromARGB(138,2,174,1000);
  late List<Contries> _contrie = [];
  Contries? _selectedValue,_selectedValue1,_selectedValue2;
  Contries? _EXPORT_COUNTRY,_ORIGIN_COUNTRY,_TRANSIET_COUNTRY;
  @override
  void initState() {
    super.initState();

    Future.delayed(Duration.zero, () {
      _getData(context);
    });
  }

  void _getData(BuildContext context) async {

    showDialog(
      barrierDismissible: false,
      context: context,
      builder: (_) {
        return Dialog(
          backgroundColor: Colors.white,
          child: Padding(
            padding: const EdgeInsets.symmetric(vertical: 20),
            child: Column(
              mainAxisSize: MainAxisSize.min,
              children: [
                Image.asset('assets/loding.gif'),
                SizedBox(height: 15),
                Text('...تحميل'),

              ],
            ),
          ),
        );
      },
    );
    _contrie = (await ApiService().getcontries())!;
    if(_contrie != null){
      if (Navigator.of(context, rootNavigator: true).canPop()) {
        Navigator.of(context, rootNavigator: true).pop();
        // Close the dialog
      }
    }
  }

  TextEditingController _tap1 = TextEditingController();
  TextEditingController _tap2 = TextEditingController();
  TextEditingController _tap3 = TextEditingController();
  TextEditingController _tap4 = TextEditingController();
  TextEditingController _tap5 = TextEditingController();
  TextEditingController _tap6 = TextEditingController();
  TextEditingController _tap7 = TextEditingController();
  TextEditingController _tap8 = TextEditingController();
  TextEditingController _tap9 = TextEditingController();

  TextEditingController _tap11 = TextEditingController();

  TextEditingController _tap14 = TextEditingController();
  TextEditingController _tap15 = TextEditingController();
  TextEditingController _tap16 = TextEditingController();
  TextEditingController _tap17 = TextEditingController();
  TextEditingController _tap18 = TextEditingController();

  bool _validate = false;
  bool _validate1 = false;
  bool _validate2 = false;
  bool _validate3 = false;
  bool _validate4 = false;
  bool _validate5 = false;
  bool _validate6 = false;
  bool _validate7 = false;

  bool _validate10 = false;

  bool _validate12 = false;

  bool _validate15 = false;

  final GlobalKey<State> _statefulBuilderKey = GlobalKey<State>();
  DateTime dateTime0 = DateTime.now();
  DateTime dateTime1 = DateTime.now();
  List<RowModel> rows = [];
  @override
  Widget build(BuildContext context) {
    return Directionality(
        textDirection: TextDirection.rtl,
        child:Scaffold(
            appBar:AppBar(
              title: Center(child: Text('اللجنة المنضمة لسباق الهجن')),
              shape: RoundedRectangleBorder(
                borderRadius: BorderRadius.vertical(
                  bottom: Radius.circular(40.0),
                ),
              ),
              leading: IconButton(
                icon: Icon(Icons.arrow_back, color: Colors.black),
                onPressed: () => Navigator.of(context).pushAndRemoveUntil(
                    MaterialPageRoute(builder: (context) => MyHomePage()),
                        (route) => false),
              ),
              flexibleSpace: Container(
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.only(
                    bottomLeft: Radius.circular(40.0),
                    bottomRight: Radius.circular(40.0),
                  ),
                  gradient: LinearGradient(
                    colors: [_primaryColor, _accentColor], // Start and end colors
                    begin: Alignment.centerLeft,
                    end: Alignment.centerRight,
                  ),
                ),
              ),
            ),

            body:SingleChildScrollView( // Wrap your content with SingleChildScrollView
                child:  Center(
                  child: Column(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: <Widget>[
                        SizedBox(
                          height: 10, // <-- SEE HERE
                        ),

                        TextFormField(
                          controller: _tap1,
                          keyboardType: TextInputType.number,
                          decoration: InputDecoration(
                              errorText: _validate ? 'يرجي ادخال اسم صحيح' : null,
                              label: Text('COMP_ID'),
                              border: OutlineInputBorder()),
                        ),
                        const SizedBox(
                          height: 10,
                        ),
                        TextFormField(
                          controller: _tap2,
                          decoration: InputDecoration(
                              errorText: _validate1 ? 'يرجي ادخال اسم صحيح' : null,
                              label: Text('EUSER_QID'),
                              border: OutlineInputBorder()),
                        ),
                        const SizedBox(
                          height: 10,
                        ),
                        TextFormField(
                          controller: _tap3,
                          decoration: InputDecoration(
                              errorText: _validate2 ? 'يرجي ادخال اسم صحيح' : null,
                              label: Text('اسم المصدر'),
                              border: OutlineInputBorder()),
                        ),
                        const SizedBox(
                          height: 10,
                        ),
                        TextFormField(
                          controller: _tap4,
                          keyboardType: TextInputType.number,
                          decoration: InputDecoration(
                              errorText: _validate3 ? 'يرجي ادخال هاتف صحيح' : null,
                              label: Text('هاتف المصدر'),
                              border: OutlineInputBorder()),
                        ),
                        const SizedBox(
                          height: 10,
                        ),
                        TextFormField(
                          controller: _tap5,
                          decoration: InputDecoration(
                              errorText: _validate4 ? 'يرجي ادخال اسم صحيح' : null,
                              label: Text('QID الموارد'),
                              border: OutlineInputBorder()),
                        ),
                        const SizedBox(
                          height: 10,
                        ),



                        TextFormField(
                          controller: _tap6,
                          decoration: InputDecoration(
                              errorText: _validate5 ? 'يرجي ادخال فاكس صحيح' : null,
                              label: Text('فاكس المصدر'),
                              border: OutlineInputBorder()),
                        ),
                        const SizedBox(
                          height: 10,
                        ),
                        Directionality(
                          textDirection: TextDirection.rtl,
                          child: Center(
                            child: Row(
                              children: [
                                Text('البلد المصدر '),
                                SizedBox(
                                  width: 30,
                                ),
                                DropdownButton<Contries>(
                                  hint: Text('البلد المصدر '),
                                  items:_contrie.map<DropdownMenuItem<Contries>>((Contries value) {
                                    return DropdownMenuItem<Contries>(
                                      value:  value ,
                                      child: Text( value.name ),
                                    );
                                  }).toList(),
                                  onChanged: (newValue) {
                                    setState(() {
                                      _selectedValue = newValue;
                                      // print("selected2 "+_selectedValue!.name.toString());
                                    });
                                  },
                                  value: _selectedValue,
                                ),
                              ],
                            ),
                          ),
                        ),


                        TextFormField(
                          controller: _tap17,
                          decoration: InputDecoration(
                              errorText: _validate6 ? 'يرجي ادخال  عنوان المورد صحيح' : null,
                              label: Text(' المورد'),
                              border: OutlineInputBorder()),
                        ),
                        const SizedBox(
                          height: 10,
                        ),







                        TextFormField(
                          controller: _tap8,
                          keyboardType: TextInputType.number,
                          decoration: InputDecoration(
                              errorText: _validate7 ? 'يرجي ادخال فاكس  الموارد صحيح' : null,
                              label: Text('فاكس  الموارد '),
                              border: OutlineInputBorder()),
                        ),
                        const SizedBox(
                          height: 10,
                        ),


                        TextFormField(
                          controller: _tap9,
                          keyboardType: TextInputType.number,
                          decoration: InputDecoration(
                              errorText: _validate10 ? 'يرجي ادخال هاتف المورد صحيح' : null,
                              label: Text('هاتف المورد'),
                              border: OutlineInputBorder()),

                        ),
                        const SizedBox(
                          height: 10,
                        ),




                        Directionality(
                          textDirection: TextDirection.rtl,
                          child: Center(
                            child: Row(
                              children: [
                                Text('البلد المورد '),
                                SizedBox(
                                  width: 30,
                                ),
                                DropdownButton<Contries>(
                                  hint: Text('البلد المورد '),
                                  items:_contrie.map<DropdownMenuItem<Contries>>((Contries value) {
                                    return DropdownMenuItem<Contries>(
                                      value:  value ,
                                      child: Text( value.name ),
                                    );
                                  }).toList(),
                                  onChanged: (newValue) {
                                    setState(() {
                                      _selectedValue1 = newValue;
                                      // print("selected2 "+_selectedValue!.name.toString());
                                    });
                                  },
                                  value: _selectedValue1,
                                ),
                              ],
                            ),
                          ),
                        ),



                        const SizedBox(
                          height: 10,
                        ),
                        Directionality(
                          textDirection: TextDirection.rtl,
                          child: Center(
                            child: Row(
                              children: [
                                Text('البلد الأصلي '),
                                SizedBox(
                                  width: 30,
                                ),
                                DropdownButton<Contries>(
                                  hint: Text('البلد الأصلي '),
                                  items:_contrie.map<DropdownMenuItem<Contries>>((Contries value) {
                                    return DropdownMenuItem<Contries>(
                                      value:  value ,
                                      child: Text( value.name ),
                                    );
                                  }).toList(),
                                  onChanged: (newValue) {
                                    setState(() {
                                      _selectedValue2 = newValue;
                                      // print("selected2 "+_selectedValue!.name.toString());
                                    });
                                  },
                                  value: _selectedValue2,
                                ),
                              ],
                            ),
                          ),
                        ),



                        const SizedBox(
                          height: 10,
                        ),


                        TextFormField(
                          controller: _tap11,
                          decoration: InputDecoration(
                              errorText: _validate12 ? 'يرجي ادخال مكان الشحن صحيح' : null,
                              label: Text('مكان الشحن'),
                              border: OutlineInputBorder()),
                        ),


                        const SizedBox(
                          height: 10,
                        ),












                        TextFormField(
                          controller: _tap14,
                          decoration: InputDecoration(
                              errorText: _validate12 ? 'يرجي ادخال الناقل صحيح' : null,
                              label: Text('الناقل'),
                              border: OutlineInputBorder()),
                        ),


                        const SizedBox(
                          height: 10,
                        ),




                        InkWell(
                          onTap: () async {
                            DateTime? newDate = await showDatePicker(
                                builder: (context, child) {
                                  return Theme(
                                    data: Theme.of(context).copyWith(
                                      colorScheme: const ColorScheme.light(
                                          primary: Colors.blueAccent,
                                          //      .MainColor, // header background color
                                          onPrimary:
                                          Colors.white, // header text color
                                          onSurface: Colors.blueAccent
                                        //    .AccentColor, // body text color
                                      ),
                                      textButtonTheme: TextButtonThemeData(
                                        style: TextButton.styleFrom(
                                          foregroundColor: Colors.red, // button text color
                                        ),
                                      ),
                                    ),
                                    child: child!,
                                  );
                                },
                                context: context,
                                initialDate: dateTime1,
                                firstDate:
                                DateTime.now().subtract(const Duration(days: 0)),
                                lastDate: DateTime(dateTime1.year + 2));
                            if (newDate == null) return;
                            final newDateTime = DateTime(
                              newDate.year,
                              newDate.month,
                              newDate.day,
                            );

                            setState(() {
                              dateTime1 = newDateTime;
                              _tap15.text = inl.DateFormat(
                                'yyyy-MM-dd',
                              ).format(dateTime1);
                              print(dateTime1);
                            });
                          },


                          child: TextFormField(
                            controller: _tap15,
                            enabled: false,
                            decoration: const InputDecoration(
                                label: Text('تاريخ الشحن'),
                                border: OutlineInputBorder()),
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),




                        TextFormField(
                          controller: _tap16,


                          decoration: InputDecoration(
                              errorText: _validate15 ? 'يرجي ادخال الجنسية المصدر صحيح' : null,
                              label: Text(' الجنسية المصدر'),
                              border: OutlineInputBorder()),

                        ),


                        const SizedBox(
                          height: 10,
                        ),



                        TextFormField(
                          controller: _tap18,
                          keyboardType: TextInputType.number,

                          decoration: InputDecoration(
                              errorText: _validate15 ? 'يرجي ادخال  رقم جواز السفر صحيح' : null,
                              label: Text(' رقم جواز السفر'),
                              border: OutlineInputBorder()),

                        ),


                        const SizedBox(
                          height: 10,
                        ),

                        Container(
                          decoration: BoxDecoration(
                            gradient: LinearGradient(
                              colors: [_primaryColor, _accentColor], // Start and end colors
                              begin: Alignment.centerLeft,
                              end: Alignment.centerRight,
                            ),
                            borderRadius: BorderRadius.circular(30), // Rounded corners
                          ),
                          child: ElevatedButton(
                            onPressed: () {
                              // Open a dialog to add a new row
                              _showAddRowDialog();
                            },
                            style: ElevatedButton.styleFrom(
                              primary: Colors.transparent, // Transparent background
                              onPrimary: Colors.white, // Text color
                              padding: EdgeInsets.symmetric(vertical: 10, horizontal: 40),
                              elevation: 0, // No shadow
                            ),
                            child: Text(
                              'إضافة حيوان'.toUpperCase(),
                              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
                            ),
                          ),
                        ),

                        const SizedBox(
                          height: 2,
                        ),

                        Padding(
                            padding: EdgeInsets.only(left: 40.0, right: 40.0,top: 2.0,bottom: 2.0), // Adjust the padding values as needed
                            child:
                            ListView.builder(
                              shrinkWrap: true,
                              itemCount: rows.length,
                              itemBuilder: (context, index) {
                                return Card(
                                  elevation: 4, // You can adjust the elevation for the shadow effect
                                  shape: RoundedRectangleBorder(
                                    borderRadius: BorderRadius.circular(30.0), // Radius of 5 for rounded corners
                                  ),
                                  child: Container(
                                    decoration: BoxDecoration(
                                      // color: Colors.blue, // Blue background color
                                      borderRadius: BorderRadius.circular(30.0),
                                    ),
                                    child: ListTile(
                                      title: Text('رقم الحيوان: ${rows[index].ANML_MICROCHIP}'),
                                    ),
                                  ),
                                );
                              },
                            )
                        ),
                        const SizedBox(
                          height: 10,
                        ),
                        Container(
                          decoration: BoxDecoration(
                            gradient: LinearGradient(
                              colors: [_primaryColor, _accentColor], // Start and end colors
                              begin: Alignment.centerLeft,
                              end: Alignment.centerRight,
                            ),
                            borderRadius: BorderRadius.circular(30), // Rounded corners
                          ),
                          child: ElevatedButton(
                            onPressed: () {
                              // Open a dialog to add a new row
                              _apisend();
                            },
                            style: ElevatedButton.styleFrom(
                              primary: Colors.transparent, // Transparent background
                              onPrimary: Colors.white, // Text color
                              padding: EdgeInsets.symmetric(vertical: 10, horizontal: 40),
                              elevation: 0, // No shadow
                            ),
                            child: Text(
                              'إضافة'.toUpperCase(),
                              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
                            ),
                          ),
                        ),



                        const SizedBox(
                          height: 2,
                        ),



                      ]
                  ),
                )

            )
        )
    );
  }
  Future<void> _apisend() async {
    List<Map<String, dynamic>> jsonList = [];

    for (var row in rows) {
      jsonList.add(row.toJson());
    }
    showDialog(
      barrierDismissible: false,
      context: context,
      builder: (_) {
        return Dialog(
          backgroundColor: Colors.white,
          child: Padding(
            padding: const EdgeInsets.symmetric(vertical: 20),
            child: Column(
              mainAxisSize: MainAxisSize.min,
              children: [
                Image.asset('assets/loding.gif'),
                SizedBox(height: 15),
                Text('...تحميل'),

              ],
            ),
          ),
        );
      },
    );
    List<String> variables = [
      _tap1.text,
      _tap2.text,
      _tap3.text,
      _tap4.text,
      _tap5.text,
      _tap6.text,
      _selectedValue != null ? _selectedValue!.name.toString() : '',
      _tap17.text,
      _tap7.text,
      _tap8.text,
      _tap9.text,

      _selectedValue1 != null ? _selectedValue1!.name.toString() : '',
      _selectedValue2 != null ? _selectedValue2!.name.toString() : '',
      _tap11.text,

      _tap14.text,
      _tap15.text,
      _tap16.text,
      _tap18.text,
      jsonList.toString(),
    ];

    bool hasEmptyVariable = false;

    for (var variable in variables) {
      if (variable.isEmpty) {
        hasEmptyVariable = true;
        break;
      }
    }

    if (hasEmptyVariable) {
      Navigator.of(context, rootNavigator: true).pop();
      showDialog(
        barrierDismissible: false,
        context: context,
        builder: (_) {
          return Dialog(
            backgroundColor: Colors.white,
            child: Padding(
              padding: const EdgeInsets.symmetric(vertical: 20),
              child: Column(
                mainAxisSize: MainAxisSize.min,
                children: const [

                  SizedBox(height: 15),
                  Text('الرجاء إدخال بيانات صحيحة')
                ],
              ),
            ),
          );
        },
      );

      Future.delayed(Duration(seconds: 2), () {
        if (Navigator.of(context, rootNavigator: true).canPop()) {
          Navigator.of(context, rootNavigator: true).pop(); // Close the dialog
        }
      });
    } else {
      // All variables have values, you can proceed with your logic


      Success? success =  (await ApiService().Setexports(_tap1.text,_tap2.text,_tap3.text,_tap4.text,_tap5.text,_tap6.text,_selectedValue!.name.toString(),_tap17.text,_tap8.text,_tap9.text,_selectedValue1!.name.toString(),_selectedValue2!.name.toString(),_tap11.text,_tap14.text,_tap15.text,_tap16.text,_tap18.text,jsonList));

      if(success?.message =="success"){
        if (Navigator.of(context, rootNavigator: true).canPop()) {
          Navigator.of(context, rootNavigator: true).pop(); // Close the dialog
        }

        showDialog(
          barrierDismissible: false,
          context: context,
          builder: (_) {
            return Dialog(
              backgroundColor: Colors.white,
              child: Padding(
                padding: const EdgeInsets.symmetric(vertical: 20),
                child: Column(
                  mainAxisSize: MainAxisSize.min,
                  children: const [

                    SizedBox(height: 15),
                    Text('تم إرسال طلبك بنجاح')
                  ],
                ),
              ),
            );
          },
        );

        Future.delayed(Duration(seconds: 2), () {
          if (Navigator.of(context, rootNavigator: true).canPop()) {
            Navigator.of(context, rootNavigator: true).pop(); // Close the dialog
          }
          Navigator.of(context).pushAndRemoveUntil(
              MaterialPageRoute(builder: (context) => MyHomePage()),
                  (route) => false);
        });



      }else{
        if (Navigator.of(context, rootNavigator: true).canPop()) {
          Navigator.of(context, rootNavigator: true).pop();
          // Close the dialog
        }
        showDialog(
          barrierDismissible: false,
          context: context,
          builder: (_) {
            return Dialog(
              backgroundColor: Colors.white,
              child: Padding(
                padding: const EdgeInsets.symmetric(vertical: 20),
                child: Column(
                  mainAxisSize: MainAxisSize.min,
                  children: const [

                    SizedBox(height: 15),
                    Text('الرجاء إدخال بيانات صحيحة')
                  ],
                ),
              ),
            );
          },
        );

        Future.delayed(Duration(seconds: 2), () {
          if (Navigator.of(context, rootNavigator: true).canPop()) {
            Navigator.of(context, rootNavigator: true).pop(); // Close the dialog
          }
        });
      }
    }

  }


  void _showAddRowDialog() {


    String ANML_SPECIES = '';
    String ANML_SEX = '';
    String ANML_MICROCHIP = '';
    String ANML_USE = '';


    showDialog(
        context: context,
        builder: (context) {
          return  StatefulBuilder(

            builder: (BuildContext context,  setStateInsideDialog) {
              return AlertDialog(
                title: Text('أضف حيوان'),
                content: SingleChildScrollView(
                  child: Column(
                    mainAxisSize: MainAxisSize.min,
                    children: [

                      TextField(
                        decoration: InputDecoration(labelText: 'نوع  الحيوان'),
                        textDirection: TextDirection.rtl,
                        onChanged: (value) {
                          ANML_SPECIES = value;
                        },
                      ),
                      TextField(
                        decoration: InputDecoration(labelText: 'جنس الحيوان'),
                        // keyboardType: TextInputType.number,
                        textDirection: TextDirection.rtl,
                        onChanged: (value) {
                          ANML_SEX = value;
                        },
                      ),

                      TextField(
                        decoration: InputDecoration(labelText: 'رقم  الحيوان'),
                        keyboardType: TextInputType.number,
                        textDirection: TextDirection.rtl,
                        onChanged: (value) {
                          ANML_MICROCHIP = value;
                        },
                      ),

                      TextField(
                        decoration: InputDecoration(labelText: 'استخدام  الحيوان'),
                        //  keyboardType: TextInputType.number,
                        textDirection: TextDirection.rtl,
                        onChanged: (value) {
                          ANML_USE = value;
                        },
                      ),


                    ],
                  ),
                ),
                actions: [
                  TextButton(
                    onPressed: () {
                      Navigator.of(context).pop();
                    },
                    child: Text('إلغاء'),
                  ),
                  TextButton(
                    onPressed: () {
                      setState(() {
                        print(rows.length);
                        if (
                            ANML_SPECIES != '' &&
                            ANML_SEX != '' &&
                            ANML_MICROCHIP != '' &&
                            ANML_USE != '') {
                          rows.add(RowModel(

                            ANML_SPECIES,
                            ANML_SEX,
                            ANML_MICROCHIP,
                            ANML_USE,

                          ));
                          Navigator.of(context).pop();
                        }

                      });


                    },
                    child: Text('أضاف'),
                  ),
                ],
              );

            },
          );}
    );

  }
}





class RowModel {


  final String ANML_SPECIES;

  final String ANML_SEX;

  final String ANML_MICROCHIP;

  final String ANML_USE;


  RowModel(
      this.ANML_SPECIES, this.ANML_SEX, this.ANML_MICROCHIP, this.ANML_USE,
     );

  Map<String, dynamic> toJson() {
    return {

      'ANML_SPECIES': ANML_SPECIES,
      'ANML_SEX': ANML_SEX,
      'ANML_MICROCHIP': ANML_MICROCHIP,
      'ANML_USE': ANML_USE,

    };
  }

}
