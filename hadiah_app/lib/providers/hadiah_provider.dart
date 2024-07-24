import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import '../models/hadiah.dart';

class HadiahProvider with ChangeNotifier {
  List<Hadiah> _hadiahList = [];

  List<Hadiah> get hadiahList => _hadiahList;

  Future<void> fetchHadiah() async {
    final url = 'https://your-laravel-api-endpoint.com/api/hadiah';
    final response = await http.get(Uri.parse(url));
    final List<dynamic> extractedData = json.decode(response.body);

    _hadiahList = extractedData.map((data) => Hadiah.fromJson(data)).toList();
    notifyListeners();
  }

  Future<void> updateHadiahStatus(String id, bool received, String reason) async {
    final url = 'https://your-laravel-api-endpoint.com/api/hadiah/$id';
    final response = await http.put(
      Uri.parse(url),
      headers: {'Content-Type': 'application/json'},
      body: json.encode({
        'received': received,
        'failedReason': reason,
      }),
    );

    if (response.statusCode == 200) {
      fetchHadiah();
    }
  }
}
