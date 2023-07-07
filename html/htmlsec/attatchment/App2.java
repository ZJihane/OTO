package tp4 ;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.text.DecimalFormat;

public class App2 extends JFrame implements ActionListener {
    JLabel aLab,bLab,cLab,resLab;
    JPanel panel;
    JButton resButt;
    JTextField aText,bText,cText;
    public App2(){
        aLab=new JLabel("a");
        bLab=new JLabel("b");
        cLab=new JLabel("c");
        resLab=new JLabel();
        aText=new JTextField(12);
        bText=new JTextField(12);
        cText=new JTextField(12);
        resButt=new JButton("resultat");
        this.panel = new JPanel();
        panel.setLayout(null);
        aLab.setBounds(1,5,100,30);panel.add(aLab);
        bLab.setBounds(130,5,100,30);panel.add(bLab);
        cLab.setBounds(260,5,100,30);panel.add(cLab);
        aText.setBounds(20,5,100,30);panel.add(aText);
        bText.setBounds(140,5,100,30);panel.add(bText);
        cText.setBounds(280,5,100,30);panel.add(cText);
        resButt.setBounds(380,5,100,30);panel.add(resButt);
        resButt.setBounds(380,5,100,30);panel.add(resButt);
        resLab.setBounds(140,45,300,30);panel.add(resLab);

        this.setContentPane(panel);
        this.setTitle("pol sol");
        this.setSize(400);
        this.setVisible(true);
        resButt.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                float a=Float.parseFloat(aText.getText());

                double b=Float.parseFloat(bText.getText());
                double c=Float.parseFloat(cText.getText());
                double delta = (b*b) - 4*a*c;
                if (delta<0)
                {

                    resLab.setText("Il n'y a pas de racines reelle a l'equation.");
                }
                else if (delta==0){
                    double x= -b/(2*a);
                    resLab.setText("exist une seule solution x= " +new DecimalFormat("##.##").format(x) );
                }
                else
                {
                   double x1 = (-b-Math.sqrt(delta))/(2*a);
                   double x2 =(-b+Math.sqrt(delta))/(2*a);
                    resLab.setText("Les racines sont x1 = " +new DecimalFormat("##.##").format(x1) + " et x2 = "+new DecimalFormat("##.##").format(x2));
                }
            }

        });

    }

    private void setSize(int i) {
    }




    @Override
    public void actionPerformed(ActionEvent e) {

    }
}
