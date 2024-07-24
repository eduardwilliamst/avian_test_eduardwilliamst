import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import './providers/hadiah_provider.dart';
import './screens/home_screen.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (ctx) => HadiahProvider(),
      child: MaterialApp(
        title: 'Hadiah App',
        theme: ThemeData(
          primarySwatch: Colors.blue,
        ),
        home: HomeScreen(),
      ),
    );
  }
}
