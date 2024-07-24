import 'package:flutter/material.dart';
import 'package:hadiah_app/constants.dart';
import 'package:provider/provider.dart';
import './providers/hadiah_provider.dart';
import './screens/home_screen.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (ctx) => HadiahProvider(),
      child: MaterialApp(
        title: 'Hadiah App',
        theme: ThemeData(
          useMaterial3: true,
          navigationBarTheme: const NavigationBarThemeData(
            backgroundColor: kSecondaryColor,
            labelTextStyle: WidgetStatePropertyAll(
              TextStyle(
                  fontFamily: 'Lato',
                  fontSize: 14,
                  fontWeight: FontWeight.bold),
            ),
            iconTheme: WidgetStatePropertyAll(
              IconThemeData(color: Colors.black),
            ),
            indicatorColor: Color.fromRGBO(
              170,
              142,
              111,
              1.0,
            ),
          ),
          textTheme: const TextTheme(
            headlineLarge: TextStyle(
                // fontFamily: 'DMSerifText',
                fontSize: 24,
                fontWeight: FontWeight.normal,
                color: Colors.white),
            headlineMedium: TextStyle(
                // fontFamily: 'DMSerifText',
                fontSize: 16,
                fontWeight: FontWeight.normal,
                color: Colors.white),
            bodyLarge: TextStyle(
              // fontFamily: 'Lato',
              fontSize: 16,
              fontWeight: FontWeight.bold,
              color: Colors.white,
            ),
            bodyMedium: TextStyle(
              // fontFamily: 'Lato',
              fontSize: 16,
              fontWeight: FontWeight.normal,
              color: Colors.white,
            ),
            labelLarge: TextStyle(
                // fontFamily: 'Lato',
                fontSize: 16,
                fontWeight: FontWeight.bold,
                color: Colors.white),
          ),
        ),
        home: HomeScreen(),
      ),
    );
  }
}
