import 'package:file_picker/file_picker.dart';
import 'package:flutter/material.dart';
import 'package:tasareeh/api_service.dart';
import 'package:tasareeh/common/theme_helper.dart';
import 'package:tasareeh/home.dart';
import 'package:tasareeh/model/check.dart';
import 'package:tasareeh/model/contrie.dart';
import 'package:tasareeh/model/success.dart';
import 'package:intl/intl.dart' as inl;

class OutafterContent extends StatefulWidget{
  const OutafterContent({Key? key}): super(key:key);

  @override
  _OutafterContentState createState() => _OutafterContentState();
}



class _OutafterContentState extends State<OutafterContent>{
 Color _primaryColor = Color.fromARGB(220,84,254,1000);
  Color _accentColor = Color.fromARGB(138,2,174,1000);





























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

            body:






 const Center(
          child: StepperExample(),
        ),



        )
    );
  }



}











class StepperExample extends StatefulWidget {
  const StepperExample({super.key});

  @override
  State<StepperExample> createState() => _StepperExampleState();
}

class _StepperExampleState extends State<StepperExample> {
      late List<Contries> _contrie = [];
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
  int _index = 0;
    Color _primaryColor = Color.fromARGB(220,84,254,1000);
  Color _accentColor = Color.fromARGB(138,2,174,1000);
bool hide = false;
  Contries? _EXPORT_COUNTRY,_ORIGIN_COUNTRY;

  Contries? _EXPORT_COUNTRYa,_ORIGIN_COUNTRYa,_TRANSIET_COUNTRY;
  TextEditingController IMP_CER_SERIAL = TextEditingController();

  TextEditingController SHIPPING_DATE = TextEditingController();
  final GlobalKey<State> _statefulBuilderKey = GlobalKey<State>();
  DateTime dateTime0 = DateTime.now();
  DateTime dateTime1 = DateTime.now();
 String EXPORT_COUNTRY = '';
    String ORIGIN_COUNTRY = '';

    String TRANSIET_COUNTRY = '';

    String ANML_NUMBER = '';

   String? files,Pledge;

 Future<void> _pickPDF() async {
    FilePickerResult? result = await FilePicker.platform.pickFiles(
      type: FileType.custom,
      allowedExtensions: ['pdf'],
    );

    if (result != null) {
      setState(() {
        files = result.files.single.path;
      });
    }
  }


 Future<void> _pickPDF2() async {
    FilePickerResult? result = await FilePicker.platform.pickFiles(
      type: FileType.custom,
      allowedExtensions: ['pdf'],
    );

    if (result != null) {
      setState(() {
        Pledge = result.files.single.path;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Stepper(
        type: StepperType.horizontal,
      currentStep: _index,

      onStepContinue: () {
        if (_index <= 0) {
          setState(() {
            _index += 1;
           if (_index == 1) {
             hide = true;
           }else if (_index == 0) {
            hide = false;
           }
print(_index);
          });
        }
      },
      onStepTapped: (int index) {
        setState(() {
          _index = index;
           print(hide);
           if (_index == 1) {
             hide = true;
           }else if (_index == 0) {
            hide = false;
           }
            print(hide);
        });
      },
  onStepCancel: () {
        if (_index > 0) {
          setState(() {
            _index -= 1;
          });
        }
      },

  steps: <Step>[
        Step(
          title: const Text('البيانات العامة'),
          content: Container(

            child: SingleChildScrollView( // Wrap your content with SingleChildScrollView
                child:  Center(
                  child: Column(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: <Widget>[

                        SizedBox(
                          height: 10, // <-- SEE HERE
                        ),



 TextFormField(
                          controller: IMP_CER_SERIAL,
                          decoration: InputDecoration(
                              label: Text('معرفه الدخول'),
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
                              checkd();
                            },
                            style: ElevatedButton.styleFrom(
                              primary: Colors.transparent, // Transparent background
                              onPrimary: Colors.white, // Text color
                              padding: EdgeInsets.symmetric(vertical: 10, horizontal: 40),
                              elevation: 0, // No shadow
                            ),
                            child: Text(
                              'البحث'.toUpperCase(),
                              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
                            ),
                          ),
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
                              SHIPPING_DATE.text = inl.DateFormat(
                                'yyyy-MM-dd',
                              ).format(dateTime1);
                              print(dateTime1);
                            });
                          },


                          child: TextFormField(
                            controller: SHIPPING_DATE,
                            enabled: false,
                            decoration: const InputDecoration(
                                label: Text('تاريخ الشحن'),
                                border: OutlineInputBorder()),
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
                                      _EXPORT_COUNTRY = newValue;
                                      // print("selected2 "+_EXPORT_COUNTRY!.name.toString());
                                    });
                                  },
                                  value: _EXPORT_COUNTRY,
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
                                      _ORIGIN_COUNTRY = newValue;
                                      // print("selected2 "+_selectedValue!.name.toString());
                                    });
                                  },
                                  value: _ORIGIN_COUNTRY,
                                ),
                              ],
                            ),
                          ),
                        ),



                        const SizedBox(
                          height: 10,
                        ),

 ElevatedButton(
              onPressed: _pickPDF,
              child: Text( 'كشف المطايا'),
            ),

 const SizedBox(
                          height: 10,
                        ),

                         ElevatedButton(
              onPressed: _pickPDF2,
              child: Text('التعهد'),
            ),

                      ]
                  ),
                  )
                  ),
          ),
        ),
         Step(
          title: const Text('أضف هجن'),
          content: Container(

            child: SingleChildScrollView(
              child: Column(
                  mainAxisSize: MainAxisSize.min,
                  children: [
                    Directionality(
                      textDirection: TextDirection.rtl,
                      child: Center(
                        child: Row(
                          children: [
                        //    Text('البلد التصدير '),

                            DropdownButton<Contries>(
                              hint: Text('بلد التصدير'),
                              items:_contrie.map<DropdownMenuItem<Contries>>((Contries value) {
                                return DropdownMenuItem<Contries>(
                                  value:  value ,
                                  child: Text( value.name ),
                                );
                              }).toList(),
                              onChanged: (newValue) {

                                setState(() {
                                  _EXPORT_COUNTRYa = newValue; // Update the selected value
                                  EXPORT_COUNTRY = newValue!.name; // Update the string value
                                  print("selected2 " + EXPORT_COUNTRY);
                                });
                              },
                              value: _EXPORT_COUNTRYa,
                            ),
                          ],
                        ),
                      ),
                    ),
                    Directionality(
                      textDirection: TextDirection.rtl,
                      child: Center(
                        child: Row(
                          children: [
                        //    Text('البلد الأصلي '),

                            DropdownButton<Contries>(
                              hint: Text('بلد الأصلي'),
                              items:_contrie.map<DropdownMenuItem<Contries>>((Contries value) {
                                return DropdownMenuItem<Contries>(
                                  value:  value ,
                                  child: Text( value.name ),
                                );
                              }).toList(),
                              onChanged: (newValue) {
                                setState(() {
                                  _ORIGIN_COUNTRYa = newValue; // Update the selected value
                                  ORIGIN_COUNTRY = newValue!.name; // Update the string value
                                  print("ORIGIN_COUNTRY " + ORIGIN_COUNTRY);
                                });
                              },
                              value: _ORIGIN_COUNTRYa,
                            ),
                          ],
                        ),
                      ),
                    ),
                    Directionality(
                      textDirection: TextDirection.rtl,
                      child: Center(
                        child: Row(
                          children: [
                     //       Text('البلد العبور '),

                            DropdownButton<Contries>(
                              hint: Text('بلد العبور'),
                              items:_contrie.map<DropdownMenuItem<Contries>>((Contries value) {
                                return DropdownMenuItem<Contries>(
                                  value:  value ,
                                  child: Text( value.name ),
                                );
                              }).toList(),
                              onChanged: (newValue) {
                                setState(() {
                                  _TRANSIET_COUNTRY = newValue; // Update the selected value
                                  TRANSIET_COUNTRY = newValue!.name; // Update the string value
                                  print("TRANSIET_COUNTRY " + TRANSIET_COUNTRY);
                                });
                              },
                              value: _TRANSIET_COUNTRY,
                            ),
                          ],
                        ),
                      ),
                    ),


                    TextField(
                      decoration: InputDecoration(labelText: 'عدد هجن'),
                      keyboardType: TextInputType.number,
                      onChanged: (value) {
                        ANML_NUMBER = value;
                      },
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



                  ],
                ),
              ),
          ),
        ),


      ],
      controlsBuilder: (BuildContext ctx, ControlsDetails dtl){
           return Row(
            children: <Widget>[
              TextButton(
                onPressed: dtl.onStepContinue,
                child: Text(hide == true ? '' :'التالي'),
              ),
              TextButton(
                onPressed: dtl.onStepCancel,
                child: Text(hide == true ? '' :''),
              ),
            ],
          );
        },



    );
  }

   Future<void> _apisend() async {




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

      _EXPORT_COUNTRY != null ? _EXPORT_COUNTRY!.name.toString() : '',
      _EXPORT_COUNTRYa != null ? _EXPORT_COUNTRYa!.name.toString() : '',
      _ORIGIN_COUNTRY != null ? _ORIGIN_COUNTRY!.name.toString() : '',
      _ORIGIN_COUNTRYa != null ? _ORIGIN_COUNTRYa!.name.toString() : '',
      _TRANSIET_COUNTRY != null ? _TRANSIET_COUNTRY!.name.toString() : '',

      SHIPPING_DATE.text,

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


    Success? success =  (await ApiService().Setexport(_EXPORT_COUNTRY!.name.toString(),_ORIGIN_COUNTRY!.name.toString(),_EXPORT_COUNTRYa!.name.toString(),_ORIGIN_COUNTRYa!.name.toString(),_TRANSIET_COUNTRY!.name.toString(),SHIPPING_DATE.text,ANML_NUMBER,files,Pledge,IMP_CER_SERIAL.text));

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
  Future<void> checkd() async {




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


      IMP_CER_SERIAL.text

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


    check? checks =  (await ApiService().getcheck(IMP_CER_SERIAL.text));

    if(checks!.aPPLICATIONSTATUS!.isNotEmpty){
  if (Navigator.of(context, rootNavigator: true).canPop()) {
    Navigator.of(context, rootNavigator: true).pop(); // Close the dialog
  }

  // ignore: use_build_context_synchronously
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
              Text('{checks.aPPLICATIONSTATUS.toString()}')
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
}
